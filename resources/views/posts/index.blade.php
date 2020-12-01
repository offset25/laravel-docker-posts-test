@extends('layout.layout')
@section('content')

<h1>Post List</h1>
<div class="row">

	<div class="col-md-2">
		<a class="btn btn-primary" href="{{ route('create') }}">Add Post</a>
	</div>	
	<div class="col-md-2 pull-left">
		<button class="btn btn-primary" onclick="filter();">Filter with content "q"</button>
	</div>	
	<div class="col-md-2">
		<a class="btn btn-primary" href="{{ route('homepost') }}">Reset Filter</a>
	</div>	

	<div class="col-md-2 pull-right">
		<select class="form-control" name="sorting" id="sorting" onchange="sorting();">
			<option value="">--Sorting Options--</option>
			<option value="1" @if( request()->get('sorting') == "1" ) selected=""  @endif >Title Length</option>
			<!-- <option value="2" @if( request()->get('sorting') == "2" ) selected=""  @endif>Letter q only</option> -->
		</select>	
	</div>	
	

</div>  
<div class="row">&nbsp;</div><br>
<div class="row">
	<table class="table table-bordered">
		<thead class="thead-light">
			<th width="15%">@sortablelink('name')</th>
			<th width="15%">@sortablelink('title')</th>
			<th width="55%">@sortablelink('content')</th>
			<th width="15%">Action</th>
		</thead>
		<tbody>
		@if(!empty($posts))
	    	@foreach($posts as $postKey => $postValue)
	    	
	    	@php
	    	$id = $postValue["id"];
	    	@endphp
	    	<tr>
	    		<td>{{ $postValue['name'] }}</td>
	    		<td>{{ $postValue['title'] }}</td>
	    		<td>{{ $postValue['content'] }}</td>
	    		<td>
	    			<a href="{{ route('editpost',$id) }}" class="btn btn-primary">Edit</a>
	    			<a href="{{ route('deletepost',$id) }}" class="btn btn-primary">Delete</a>
	    		</td>  
	    	</tr>
	    	@endforeach
	    @else
	    	<tr>
	    		<td colspan="3">No post found</td>
	    	</tr>
	    @endif	
		</tbody>    
	</table>	
	{!! $posts->appends(\Request::except('page'))->render() !!}
</div>	
@endsection

<script>
	function removeURLParameter(url, parameter) {
	    //prefer to use l.search if you have a location/link object
	    var urlparts = url.split('?');   
	    if (urlparts.length >= 2) {

	        var prefix = encodeURIComponent(parameter) + '=';
	        var pars = urlparts[1].split(/[&;]/g);

	        //reverse iteration as may be destructive
	        for (var i = pars.length; i-- > 0;) {    
	            //idiom for string.startsWith
	            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
	                pars.splice(i, 1);
	            }
	        }

	        return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
	    }
	    return url;
	}

	function filter() {
		var currentUrl = '<?php echo url()->full(); ?>';
		currentUrl = removeURLParameter(currentUrl,'q');
		if(currentUrl.indexOf('?') !== -1) {  
			document.location.href=currentUrl+'&q=q';
		} else {
			document.location.href=currentUrl+'?q=q';
		}
	}
	function sorting() {
		var sorting = document.getElementById('sorting').value;
		var currentUrl = '<?php echo url()->full(); ?>';
		currentUrl = removeURLParameter(currentUrl,'sorting');
		if(currentUrl.indexOf('?') !== -1) {  
			document.location.href=currentUrl+'&sorting='+sorting;
		} else {
			document.location.href=currentUrl+'?sorting='+sorting;;
		}
		
	}
</script>	