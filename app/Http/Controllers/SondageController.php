<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Sondage;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SondageController extends Controller
{

    public function __construct()
    {

        $this->middleware(['permission:read_sondages'])->only('index');
        $this->middleware(['permission:create_sondages'])->only('create');
        $this->middleware(['permission:update_sondages'])->only('edit');
        $this->middleware(['permission:delete_sondages'])->only('destroy');

    }

    public function index()
    {

        $sondages = Sondage::latest()->paginate(10);
        return view('dashboard.sondages.index', compact('sondages'));
    }


    public function create()
    {
        return view('dashboard.sondages.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'unique:sondages,title'],
            'description' => 'required',
            'question' => 'required',
            'image' => 'image',
        ]);

        $request_data = $request->except(['image']);

        if ($request->image) {

//            Image::make($request->image)
//                ->resize(300, null, function ($constraint) {
//                    $constraint->aspectRatio();
//                })
//                ->save(public_path('uploads/product_images/' . $request->image->hashName()));
//
//            $request_data['image'] = $request->image->hashName();

            $hashName = $request->image->hashName();
            $request->image->move(base_path() . '/public/uploads/sondage_images/', $hashName);
            $request_data['image'] = $hashName;

        } //end of if

        $sondage = Sondage::create($request_data);

        $users = \App\User::all();

        foreach ($users as $user) {

            $sondage->users()->attach($user->id);
        }

        session()->flash('success', 'added_successfully');
        return redirect()->route('dashboard.sondages.index');

    }


    public function edit(Sondage $sondage)
    {

        return view('dashboard.sondages.edit', compact('sondage'));
    }


    public function update(Request $request, Sondage $sondage)
    {

        $request->validate([
            'title' => ['required', 'unique:sondages,title,' . $sondage->id . ',id'],
            'description' => 'required',
            'question' => 'required',
            'image' => 'image',
        ]);

        $request_data = $request->except(['image']);

        if ($request->image) {

//            Image::make($request->image)
//                ->resize(300, null, function ($constraint) {
//                    $constraint->aspectRatio();
//                })
//                ->save(public_path('uploads/product_images/' . $request->image->hashName()));
//
//            $request_data['image'] = $request->image->hashName();

            $hashName = $request->image->hashName();
            $request->image->move(base_path() . '/public/uploads/sondage_images/', $hashName);
            $request_data['image'] = $hashName;

        } //end of if

        $sondage->update($request_data);

        session()->flash('success', 'updated_successfully');
        return redirect()->route('dashboard.sondages.index');
    }


    public function destroy(Sondage $sondage)
    {

        if ($sondage->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/sondage_images/' . $sondage->image);

        } //end of if

        $sondage->delete();
        session()->flash('success', 'site.deleted_successfully');
        return redirect()->route('dashboard.sondages.index');

    }

    public function updated(Request $request)
    {

        $sondage = Sondage::find($request->sondage_id);
        //$user = User::find($request->user_id);
        $user = $sondage->users()->find($request->user_id);
        if ($request->type == "oui") {
            if ($user->pivot->oui == 1) {
                $user->pivot->oui = 0;
            } else {
                $user->pivot->oui = 1;
            }

            $user->pivot->non = 0;
            $user->pivot->ignorer = 0;
        }

        if ($request->type == "non") {
            if ($user->pivot->non == 1) {
                $user->pivot->non = 0;
            } else {
                $user->pivot->non = 1;
            }

            $user->pivot->oui = 0;
            $user->pivot->ignorer = 0;
        }

        if ($request->type == "ignorer") {
            if ($user->pivot->ignorer == 1) {
                $user->pivot->ignorer = 0;
            } else {
                $user->pivot->ignorer = 1;
            }

            $user->pivot->non = 0;
            $user->pivot->oui = 0;
        }
        $user->pivot->save();

        return response()->json(['success' => 'updated', 'sondage_id' => $request->sondage_id]);
    }//end of update function
}
