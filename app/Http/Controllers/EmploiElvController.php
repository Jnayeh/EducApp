<?php

namespace App\Http\Controllers;

use App\Models\EmploiElv;
use Illuminate\Http\Request;

class EmploiElvController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
     {
         $this->middleware('auth');
     }*/

    public function index()
    {
        $emplois = EmploiElv::all();
        return view('emplois_elv.index', compact('emplois'));
    }
    

    public function create()
    {
        return view('emplois_elv.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $emploi = new EmploiElv();
        $photo= $request->file('photo');
        $filename= date('YmdHi').$photo->getClientOriginalName();
        $photo-> move(public_path('files'), $filename);
        $emploi->photo = 'files/' . $filename;
        $emploi->save();
        return redirect('/emplois_elv')->with('success','Emploi created successfully!');
    }

    public function show( $id)
    {
        $emploi =EmploiElv::find($id);
        return view('emplois_elv.show', compact('emploi'));
    }

    public function edit( $id)
    {
        $emploi =EmploiElv::find($id);
        return view('emplois_elv.edit', compact('emploi'));
    }

    public function update( $id, Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $emploi =EmploiElv::find($id);

        $photo= $request->file('photo');
        $filename= date('YmdHi').$photo->getClientOriginalName();
        $photo-> move(public_path('files'), $filename);
        $emploi->photo = 'files/' . $filename;
        $emploi->save();
        return redirect('/emplois_elv')->with('success','Emploi updated successfully!');
    }

    public function destroy( $id)
    {
        EmploiElv::destroy($id);
        return redirect('/emplois_elv')->with('success','Emploi deleted successfully!');
    }
}
