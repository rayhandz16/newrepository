<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use Session;
use Auth;
use File;
use Image;

class PasiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::orderBy('created_at','desc')->get();

        return view('pasiens.index')->with('pasiens', $pasiens);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new Pasien;

        // upload the article //
        // $file = $request->file('image');
        $file = Image::make($request->file('image_ktp'))->resize(300, 180);
        $destination_path = 'uploads/';
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        $filename = str_random(6).'.png';
        // $file->move($destination_path, $filename);
        $file->save($destination_path.$filename);
        
        // save article data into database //
        $pasien->image_ktp = $destination_path . $filename;
        $pasien->nama = $request->input('nama');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->jns_kelamin = $request->input('jns_kelamin');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        Session::flash("notice", "Pasien success Added");
        return redirect()->route("pasiens.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);
        return view('pasiens.show')->with('pasien', $pasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('pasiens.edit')->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        if($request->hasFile('image')){
            $file = Image::make($request->file('image_ktp'))->resize(300, 180);
            $destination_path = 'uploads/';
            // $filename = str_random(6).'_'.$file->getClientOriginalName();
            $filename = str_random(6).'.png';
            // $file->move($destination_path, $filename);
            $file->save($destination_path.$filename);

            // delete the old file
            $old_file = public_path($pasien->image);
            File::delete($old_file);

            $pasien->image = $destination_path.$filename;
        }
        
        
        // save pasien data into database //
        $pasien->nama = $request->input('nama');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->jns_kelamin = $request->input('jns_kelamin');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        Session::flash("notice", "Pasien success updated");
        return redirect()->route("pasiens.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::destroy($id);
        Session::flash("notice", "Pasien success deleted");
        return redirect()->route("pasiens.index");
    }
}
