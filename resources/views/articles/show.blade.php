@extends("layouts.app")
@section("content")
 <article class="row">
 <div class="col-6 offset-3">
    <h2 class="text-center mb-2">{!! $article->title !!}</h2>
    <div class="text-center mb-2">
        <img src="{{asset($article->image)}} " alt="">
    </div>
    <div class="text-justify">{!! $article->content !!}</div>
    <div class="d-flex justify-content-end">
        <a class="btn" href="{{url()->previous()}}">Back</a>
        <a class="btn" href="{{route('articles.edit',$article->id)}}">Edit</a>
                <form action="{{route('articles.destroy',$article->id)}}" method="post">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}}
                    <button class="btn btn-link" type="submit" >Delete</button>
                </form>
    </div>
 </div>
 </article>
@stop