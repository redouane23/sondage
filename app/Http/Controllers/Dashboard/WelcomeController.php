<?php

namespace App\Http\Controllers\Dashboard;

use App\Sondage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    public function __construct()
    {

        $this->middleware(['permission:read_sondages'])->only('index');

    }

    public function index()
    {

        $sondages = Sondage::all();
        $users = User::whereRoleIs('user')->get();
        return view('dashboard.welcome', compact('sondages', 'users'));

    }// end of index

}
