<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['tgl_periksa','id_pasien','dokter','hsl_diagnosa'];

    public function pasiens(){
        return $this->belongsTo('App\Pasien');
    }

}

