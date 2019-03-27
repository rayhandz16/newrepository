@extends("layouts.app")
@section("content")

 <div class="container">
 <h3>Edit Pasien</h3>
 <form method="post" enctype="multipart/form-data" action="{{route('pasiens.update', $pasien->id)}}" class="formhorizontal">
 {{csrf_field()}}
 {{method_field('PUT')}}
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input class="form-control" type="text" name="nama" value="{{$pasien->nama}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tanggal lahir</label>
        <input class="form-control" type="text" name="tgl_lahir" value="{{$pasien->tgl_lahir}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Jenis Kelamin</label>
        <input class="form-control" type="text" name="jns_kelamin" value="{{$pasien->jns_kelamin}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <textarea class="form-control" name="alamat">{{$pasien->alamat}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Image KTP</label>
        <input class="form-control-file" type="file" name="image_ktp">
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit" >Submit</button>
    <a class="btn" href="{{route('pasiens.index')}}">Back</a>
    </div>
 </form>
 </div>
@stop