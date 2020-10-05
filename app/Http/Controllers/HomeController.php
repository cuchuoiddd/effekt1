<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides = Slide::orderByDesc('id')->get();
        return view('frontend.index',compact('slides'));
    }

    public function setLocate($slug){
        app()->setLocale($slug);
        return back();
    }


}
