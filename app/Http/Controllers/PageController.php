<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;

class PageController extends Controller
{
    public function index(){
        $main =Main::first();
        $services =Service::all();
        return view('pages.index',compact('main','services'));
    }
    public function admin(){
        return view('pages.admin');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function team(){
        return view('pages.team');
    }
    public function portfolio(){
        return view('pages.portfolio');
    }
    
}
