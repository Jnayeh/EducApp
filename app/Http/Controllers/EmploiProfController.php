<?php

namespace App\Http\Controllers;

use App\Models\EmploiProf;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EmploiProfController extends Controller
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
        $emplois = EmploiProf::with('professeur')->get();
        return view('emplois_prof.index', compact('emplois'));
    }


    public function create()
    {
        $professeurs = Professeur::all();
        return view('emplois_prof.create', compact('professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'professeur_id' => 'required|unique:emploi_profs',

        ]);
        $emploi = new EmploiProf();
        $photo = $request->file('photo');
        $filename = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('files'), $filename);
        $emploi->photo = 'files/' . $filename;
        $emploi->professeur_id = $request->professeur_id;
        $emploi->save();
        return redirect('/emplois_prof')->with('success', 'Emploi created successfully!');
    }

    public function show($id)
    {
        $emploi = EmploiProf::with('professeur')->find($id);
        if ($emploi) {
            return view('emplois_prof.show', compact('emploi'));
        }
        abort(404);
        return view('emplois_prof.show', compact('emploi'));
    }

    public function showByProf($id)
    {
        return EmploiProf::with('professeur')->where('professeur_id', $id)->first();
    }

    public function edit($id)
    {
        $emploi = EmploiProf::find($id);
        if ($emploi) {
            $professeurs = Professeur::all();
            return view('emplois_prof.edit', compact('professeurs', 'emploi'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            //'professeur_id' => 'required|unique:emploi_profs,' . $id,

        ]);
        $emploi = EmploiProf::find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('files'), $filename);
            $emploi->photo = 'files/' . $filename;
        }

        $emploi->professeur_id = $request->professeur_id;
        $emploi->save();
        return redirect('/emplois_prof')->with('success', 'Emploi updated successfully!');
    }

    public function destroy($id)
    {
        EmploiProf::destroy($id);
        return redirect('/emplois_prof')->with('success', 'Emploi deleted successfully!');
    }
}
