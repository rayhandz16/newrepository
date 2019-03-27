<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Session;
use Auth;
use File;
use Image;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::orderBy('created_at','desc')->get();
        return view('pasiens.detail')->with('details', $details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasiens.details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = new Detail;
        
        // save article data into database //
        $detail->tgl_periksa = $request->input('tgl_periksa');
        $detail->id_pasien = $request->input('id_pasien');
        $detail->dokter = $request->input('dokter');
        $detail->hsl_diagnosa = $request->input('hsl_diagnosa');
        $detail->save();

        Session::flash("notice", "Detail success Added");
        return redirect()->route("pasiens.detail");
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
        $detail = Detail::find($id);
        return view('details.editDetail')->with('detail', $detail);
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
        $Detail = Detail::find($id);
        Session::flash("notice", "Detail Pasien success updated");
        return redirect()->route("pasiens.details", $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
