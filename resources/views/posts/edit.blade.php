@extends('layout.layout')
@section('content')

<h1>Edit Post</h1>
<hr>
<form action="{{url('edit/post', $post['id'])}}" method="POST">
    <input type="hidden" name="_method" value="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="postName"  name="name" value="{{$post['name']}}">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="postTitle"  name="title" value="{{$post['title']}}">
    </div>
    <div class="form-group">
        <label for="description">Content</label>
        <textarea class="form-control" id="postContent" name="content">{{$post['content']}}</textarea>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection