<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;
use App\About;
use App\Portfolio;

class PageController extends Controller
{
    public function index(){
        $main =Main::first();
        $services =Service::all();
        $abouts =About::all();
        $portfolios =Portfolio::all();
        return view('pages.index',compact('main','services','abouts','portfolios'));
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
