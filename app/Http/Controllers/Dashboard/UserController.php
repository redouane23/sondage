<?php

namespace App\Http\Controllers\Dashboard;

use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }

    public function index(Request $request)
    {

        $users = User::whereRoleIs('user')->latest()->paginate(15);

        return view('dashboard.users.index', compact('users'));

    } //end of index


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(user $user)
    {
        //
    }


    public function edit(user $user)
    {
        //
    }


    public function update(Request $request, user $user)
    {
        //
    }


    public function destroy(user $user)
    {
        if ($user->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

        } //end of if

        $user->delete();
        session()->flash('success', 'site.deleted_successfully');
        return redirect()->route('dashboard.users.index');
    }
}
