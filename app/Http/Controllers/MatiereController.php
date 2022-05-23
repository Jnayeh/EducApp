<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
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
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }


    public function getAll()
    {
        return Matiere::all();
    }

    public function create()
    {
        return view('matieres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'coefficient' => 'required',
        ]);
        $matiere = new Matiere();
        $matiere->fill($request->all())->save();

        return redirect('/matieres')->with('success', 'Matiere created successfully!');
    }

    public function show($id)
    {
        $matiere = Matiere::find($id);
        if ($matiere) {
            return view('matieres.show', compact('matiere'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $matiere = Matiere::find($id);
        if ($matiere) {
            return view('matieres.edit', compact('matiere'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'coefficient' => 'required',
        ]);
        $matiere = Matiere::find($id);
        $matiere->fill($request->all())->save();
        return redirect('/matieres')->with('success', 'Matiere updated successfully!');
    }

    public function destroy($id)
    {
        Matiere::destroy($id);
        return redirect('/matieres')->with('success', 'Matiere deleted successfully!');
    }
}
