<?php

namespace App\Http\Controllers;

use App\Sondage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sondages = Sondage::all();
        return view('home', compact('sondages'));
    }


    public function show($id)
    {

        $sondage = Sondage::find($id);
        $sondages = Sondage::all();
        return view('show', compact('sondage', 'sondages'));
    }
}
