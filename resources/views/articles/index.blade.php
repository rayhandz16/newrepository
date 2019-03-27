@extends('layouts.app') 
@section('title','article')

@section('content')
  <div class="container">
  <div class="d-flex align-items-end justify-content-between mb-1">
  <p class="mb-0 pl-4 h5">Article</p>
  <a href="{{route('articles.create')}}" class="btn btn-primary">Create New Article</a>
  </div>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Author</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($articles as $article)
        <tr>
          <td>{{$article->id}}</td>
          <td>{{$article->title}}</td>
          <td class="text-justify">{{$article->content}}</td>
          <td>{{$article->author->name}}</td>
          <td>
            @if (Auth::user()->hasRole('manager'))
                <a href="{{route('articles.show',$article->id)}}">show</a>
                <a href="{{route('articles.edit',$article->id)}}">edit</a>
                <form action="{{route('articles.destroy',$article->id)}}" method="post">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}}
                    <button type="submit">Delete</button>
                </form>
                @else
                <a href="{{route('articles.show',$article->id)}}">show</a>
            @endif
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>  
@endsection
