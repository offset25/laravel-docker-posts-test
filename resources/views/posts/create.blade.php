@extends('layout.layout')
@section('content')
<h1>Add New Post</h1>
<hr>
<form action="{{ route('store') }}" method="post">
{{ csrf_field() }}
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="postName"  name="name">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="postTitle"  name="title">
    </div>
    <div class="form-group">
        <label for="description">Content</label>
        <textarea class="form-control" id="postContent" name="content"></textarea>
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