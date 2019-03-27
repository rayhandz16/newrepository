@extends('layouts.app')
@section('title','contact')
    

<style>
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .title {
            font-size: 84px;
        }
        .content {
            text-align: center;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
</style>


@section('content')
    <div class="content">
        <div class="title m-b-md">
            Contact Us
        </div>
        @isset($request)
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
                <p>{{ $request->name}}</p>
                <p>{{ $request->email}}</p>
                <p>{{ $request->pesan}}</p>
        </div>
        @endisset

        <div class="container">
            <form method="post" action="{{'contactUs'}}">
                {{ csrf_field() }}
            <div class="w-50 my-2 mx-auto form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter Fullname">
            </div>
            <div class="w-50 my-2 mx-auto form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="w-50 my-2 mx-auto form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" name="pesan" id="exampleFormControlTextarea" rows="3"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>    
@endsection