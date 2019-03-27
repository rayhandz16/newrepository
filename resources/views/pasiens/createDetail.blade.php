@extends("layouts.app")
@section("content")

<div class="container">
 <h3>Add a Detail Pasien</h3>
 <form method="post" enctype="multipart/form-data" action="{{route('details.store')}}" class="formhorizontal">
 {{csrf_field()}}
 <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Periksa</label>
        <input class="form-control" type="date" name="tgl_periksa">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ID Pasien</label>
        <input class="form-control" type="date" name="id_pasien">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Dokter</label>
        <input class="form-control" type="text" name="dokter">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Hasil Diagnosa</label>
        <textarea class="form-control" name="hsl_diagnosa"></textarea>
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit" >Submit</button>
    <a class="btn" href="{{route('pasiens.index')}}">Back</a>
    </div>
 </form>
 </div>
@stop