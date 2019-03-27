<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content','author_id','image'];

    public function author(){
        return $this->belongsTo('App\User');
    }
}