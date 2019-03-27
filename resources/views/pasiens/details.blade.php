@extends('layouts.app') 
@section('title','detail')

@section('content')
  <div class="container">
  <div class="d-flex align-items-end justify-content-between mb-1">
  <p class="mb-0 pl-4 h5">Detail Pasien</p>
  <a href="{{route('pasiens.create')}}" class="btn btn-primary">Create New Detail Pasien</a>
  </div>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">tgl_periksa</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Dokter</th>
          <th scope="col">Hasil Diagnosa</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($details as $detail)
        <tr>
          <td>{{$detail->id}}</td>
          <td>{{$detail->tgl_periksa}}</td>
          <td>{{$detail->id_pasien}}</td>
          <td>{{$detail->dokter}}</td>
          <td>{{$detail->hsl_diagnosa}}</td>
          <td>
            @if (Auth::user()->hasRole('manager'))
            <div class="d-flex">
                <a class="btn btn-link " href="{{route('detail.editDetail',$detail->id)}}">Edit</a>
                <a class="btn btn-link " href="{{route('pasiens.index')}}">Back</a>
            </div>
                @else
                <a href="{{route('detail.show',$detail->id)}}">show</a>
            @endif
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>  
@endsection