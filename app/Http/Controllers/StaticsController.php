<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticsController extends Controller
{
    public function about(){
        return view('statics.about');
    }
    public function contactUs(){
        return view('statics.contactUs');
    }
    public function article(){
        return view('statics.article');
    }
}
