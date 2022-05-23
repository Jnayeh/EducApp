<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Professeur;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::with('professeur', 'eleve')->get();
        return view('reclamations.index', compact('reclamations'));
    }


    public function create()
    {
        $professeurs = Professeur::all();
        $eleves = Eleve::all();
        return view('reclamations.create', compact('eleves', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'eleve_id' => 'required',
            'professeur_id' => 'required',

        ]);
        $reclamation = new Reclamation();
        $reclamation->fill($request->all());
        $reclamation->save();
        return redirect('/reclamations')->with('success', 'Reclamation created successfully!');
    }

    public function show($id)
    {
        $reclamation = Reclamation::with('professeur', 'eleve')->find($id);
        if ($reclamation) {
            return view('reclamations.show', compact('reclamation'));
        }
        abort(404);
    }

    public function showByEleve($id)
    {
        return Reclamation::with('eleve')->where('eleve_id', $id)->get();
    }

    public function showByProfesseur($id)
    {
        return Reclamation::with('professeur')->where('professeur_id', $id)->get();
    }

    public function edit($id)
    {
        $reclamation = Reclamation::find($id);
        if ($reclamation) {
            $professeurs = Professeur::all();
            $eleves = Eleve::all();
            return view('reclamations.edit', compact('professeurs', 'eleves', 'reclamation'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'eleve_id' => 'required',
            'professeur_id' => 'required',

        ]);
        $reclamation = Reclamation::find($id);

        $reclamation->fill($request->all());;
        $reclamation->save();
        return redirect('/reclamations')->with('success', 'Reclamation updated successfully!');
    }

    public function destroy($id)
    {
        Reclamation::destroy($id);
        return redirect('/reclamations')->with('success', 'Reclamation deleted successfully!');
    }
}
