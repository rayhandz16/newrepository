@extends("layouts.app")
@section("content")
 <h3>Create a Article</h3>
 <form method="post" enctype="multipart/form-data" action="{{route('articles.store')}}">
 {{csrf_field()}}
 <label for="">title</label>
 <input type="text" name="title">
 <label for="">content</label>
 <textarea name="content"></textarea>
 <label for="">image</label>
 <input type="file" name="image">
 <button type="submit" >Submit</button>
 </form>
@stop