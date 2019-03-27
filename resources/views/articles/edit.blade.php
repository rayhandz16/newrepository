@extends("layouts.app")
@section("content")

 <div class="container">
 <h3>Edit Article</h3>
 <form method="post" enctype="multipart/form-data" action="{{route('articles.update', $article->id)}}" class="formhorizontal">
 {{csrf_field()}}
 {{method_field('PUT')}}
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input class="form-control" type="text" name="title" value="{{$article->title}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Content</label>
        <textarea class="form-control" name="content">{{$article->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input class="form-control-file" type="file" name="image">
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit" >Submit</button>
    <a class="btn" href="{{route('articles.index')}}">Back</a>
    </div>
 </form>
 </div>
@stop