<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\HomeWork;
use App\Models\Parents;
use App\Models\Professeur;
use App\Models\Reponse;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index()
    {
        $home_works = HomeWork::with('professeur')->get();
        return view('homeworks.index', compact('home_works'));
    }

    public function index_parent()
    {
        $home_works = HomeWork::with('professeur', 'professeur.classes')->orderBy('created_at', 'DESC')->get();
        $parent = Parents::where('email', auth()->user()->email)->first();
        $eleves = Eleve::with('reponses', 'classe')->where('parent_id', $parent->id)->get();
        return view('parent_views.homeworks.index', compact('home_works', 'eleves'));
    }

    public function index_prof()
    {
        $prof = Professeur::where('email', auth()->user()->email)->first();
        $home_works = HomeWork::with('professeur', 'professeur.classes')->where('professeur_id', $prof->id)->get();

        return view('prof_views.homeworks.index', compact('home_works'));
    }

    public function showById($id, $eleve_id)
    {
        $home_work = HomeWork::with('professeur', 'professeur.matiere')->find($id);
        $eleve = Eleve::find($eleve_id);
        $reponse = Reponse::where('eleve_id', $eleve_id)->where('home_work_id', $id)->first();
        if ($home_work) {
            return view('parent_views.homeworks.show', compact('home_work', 'eleve', 'reponse'));
        }
        abort(404);
    }

    public function showByIdProf($id)
    {
        $home_work = HomeWork::with('professeur', 'professeur.classes', 'reponses', 'reponses.eleve')->find($id);
        $eleves = Eleve::orderBy('classe_id', 'ASC')->get();
        if ($home_work) {
            return view('prof_views.homeworks.show', compact('home_work', 'eleves'));
        }
        abort(404);
    }

    public function createByProf()
    {
        $prof = Professeur::where('email', auth()->user()->email)->first();
        return view('prof_views.homeworks.create', compact('prof'));
    }

    public function create()
    {
        $professeurs = Professeur::all();
        return view('homeworks.create', compact('professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'professeur_id' => 'required',

        ]);
        $home_work = new HomeWork();
        $photo = $request->file('photo');
        $filename = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('files'), $filename);
        $home_work->photo = 'files/' . $filename;
        $home_work->professeur_id = $request->professeur_id;
        $home_work->save();
        return redirect('/home_works')->with('success', 'HomeWork created successfully!');
    }

    public function show($id)
    {
        $home_work = HomeWork::with('professeur')->find($id);
        if ($home_work) {
            return view('homeworks.show', compact('home_work'));
        }
        abort(404);
    }

    public function editByProf($id)
    {
        $home_work = HomeWork::find($id);
        if ($home_work) {
            return view('prof_views.homeworks.edit', compact('home_work'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $home_work = HomeWork::find($id);
        if ($home_work) {
            $professeurs = Professeur::all();
            return view('homeworks.edit', compact('professeurs', 'home_work'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            //'professeur_id' => 'required|unique:home_works,' . $id,

        ]);
        $home_work = HomeWork::find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('files'), $filename);
            $home_work->photo = 'files/' . $filename;
        }

        $home_work->professeur_id = $request->professeur_id;
        $home_work->save();
        return redirect('/home_works')->with('success', 'HomeWork updated successfully!');
    }

    public function destroy($id)
    {
        HomeWork::destroy($id);
        return redirect('/home_works')->with('success', 'HomeWork deleted successfully!');
    }
}
