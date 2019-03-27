@extends('layouts.app')
@section('title','about')

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
            About
        </div>
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris</p>    
        </div>   
    </div>
@endsection


