<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nama','tgl_lahir','jns_kelamin','alamat','image_ktp'];

    public function details(){
        return $this->hasMany('App\Detail');
    }
}
