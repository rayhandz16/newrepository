@extends("layouts.app")
@section("content")

 <div class="container">
 <h3>Edit Detail Pasien</h3>
 <form method="post" enctype="multipart/form-data" action="{{route('details.update', $detail->id)}}" class="formhorizontal">
 {{csrf_field()}}
 {{method_field('PUT')}}
    <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Periksa</label>
        <input class="form-control" type="text" name="nama" value="{{$detail->tgl_periksa}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Pasien</label>
        <input class="form-control disabled" type="text" name="tgl_lahir" value="{{$pasien->nama}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Dokter</label>
        <input class="form-control" type="text" name="jns_kelamin" value="{{$detail->dokter}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Hasil Diagnosa</label>
        <textarea class="form-control" name="alamat">{{$detail->alamat}}</textarea>
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit" >Submit</button>
    <a class="btn" href="{{route('pasiens.index')}}">Back</a>
    </div>
 </form>
 </div>
@stop