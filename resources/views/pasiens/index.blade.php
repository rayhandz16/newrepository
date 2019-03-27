@extends('layouts.app') 
@section('title','pasien')

@section('content')
  <div class="container">
  <div class="d-flex align-items-end justify-content-between mb-1">
  <p class="mb-0 pl-4 h5">Pasien</p>
  <a href="{{route('pasiens.create')}}" class="btn btn-primary">Create New Pasien</a>
  </div>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Alamat</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($pasiens as $pasien)
        <tr>
          <td>{{$pasien->id}}</td>
          <td>{{$pasien->nama}}</td>
          <td>{{$pasien->tgl_lahir}}</td>
          <td>{{$pasien->jns_kelamin}}</td>
          <td>{{$pasien->alamat}}</td>
          <td>
            @if (Auth::user()->hasRole('manager'))
            <div class="d-flex">
                <a class="btn btn-link " href="{{route('pasiens.show',$pasien->id)}}">Show</a>
                <a class="btn btn-link " href="{{route('pasiens.edit',$pasien->id)}}">Edit</a>
                <a class="btn btn-link " href="{{route('details.show',$pasien->detail->id)}}">Details</a>
                <form action="{{route('pasiens.destroy',$pasien->id)}}" method="post">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}}
                    <button class="btn btn-link" type="submit">Delete</button>
                </form>
            </div>
                @else
                <a href="{{route('pasiens.show',$pasien->id)}}">show</a>
            @endif
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>  
@endsection
