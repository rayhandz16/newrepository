@extends("layouts.app")
@section("content")
 <pasien class="row">
 <div class="col-6 offset-3">
    <!-- <h2 class="text-center mb-2">{!! $pasien->nama !!}</h2> -->
    <div class="text-center mb-2">
        <img src="{{asset($pasien->image_ktp)}} " alt="">
    </div>

    <table class="table table-sm table-light">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>{!! $pasien->nama !!}</td>
            </tr>
            <tr>
                <th scope="row">Tanggal lahir</th>
                <td>{!! $pasien->tgl_lahir !!}</td>
            </tr>
            <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>{!! $pasien->jns_kelamin !!}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>{!! $pasien->alamat !!}</td>
            </tr>
        </tbody>
    </table>

    <!-- <div class="text-justify">{!! $pasien->tgl_lahir !!}</div>
    <div class="text-justify">{!! $pasien->jns_kelamin !!}</div>
    <div class="text-justify">{!! $pasien->alamat !!}</div> -->
    <div class="d-flex justify-content-end">
        <!-- <a class="btn" href="{{url()->previous()}}">Back</a> -->
        <a class="btn" href="{{route('pasiens.index')}}">Back</a>
        <a class="btn" href="{{route('pasiens.edit',$pasien->id)}}">Edit</a>
                <form action="{{route('pasiens.destroy',$pasien->id)}}" method="post">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}}
                    <button class="btn btn-link" type="submit" >Delete</button>
                </form>
    </div>
 </div>
 </pasien>
@stop
