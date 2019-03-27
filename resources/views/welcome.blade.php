
    @extends('layouts.app')
    @section('title','Home')
    @section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col px-0">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Fluid jumbotron</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9 bg-success">
            1 of 2
            </div>
            <div class="col-3 bg-warning">
            2 of 2
            </div>
        </div>
    </div>

    <nav class="navbar navbar-danger bg-danger mt-3 fixed-bottom">
            <div class="container">
            <p class="lead font-weight-bold my-1">Ini adalah Footer...</p>
            </div>
          </nav>
    @endsection

