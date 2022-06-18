<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }

    public function aboutUs(){
        return view('about');
    }
    public function services(){
        return view('services');
    }
    public function portfolio(){
        return view('portfolio');
    }
    public function pricing(){
        return view('pricing');
    }
    public function contactUs(){
        return view('contact');
    }
}
