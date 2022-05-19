<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->status == 1){
            return redirect()->route('index');
        }else if(Auth::user()->status == 2){
            return redirect()->route('doctor.panel');
    }else if(Auth::user()->status == 3){
        return redirect()->route('reception.panel');
    }
    }

    public function redirect()
    {
        dd(Auth::user());
        if(Auth::user()->status == 1){
            return redirect()->route('index');
        }else if(Auth::user()->status == 2){
            return redirect()->route('doctor.panel');
    }else if(Auth::user()->status == 3){
        return redirect()->route('reception.panel');
    }
}
}
