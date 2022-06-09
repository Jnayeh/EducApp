<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Parents;
use App\Models\Professeur;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::with('professeur', 'eleve')->get();
        return view('reclamations.index', compact('reclamations'));
    }

    public function index_parent()
    {
        $unfiltered_reclamations = Reclamation::with('professeur', 'professeur.classes', 'eleve')->where('to', 'parent')->orderBy('created_at', 'DESC')->get();
        $parent = Parents::where('email', auth()->user()->email)->first();
        $notifs = $this->get_parent();
        foreach ($notifs as $notif) {

            Reclamation::where('id', $notif->id)
                ->update(['read' => 1]);
        }
        $reclamations = [];
        foreach ($unfiltered_reclamations as $reclamation) {
            if ($reclamation->eleve->parent_id == $parent->id) {
                array_push($reclamations, $reclamation);
            }
        }
        /* $eleves = Eleve::with('classe')->where('parent_id', $parent->id)->get(); */
        return view('parent_views.reclamations.index', compact('reclamations', 'parent'));
    }

    public function index_prof()
    {
        $notifs = $this->get_prof();
        foreach ($notifs as $notif) {

            Reclamation::where('id', $notif->id)
                ->update(['read' => 1]);
        }
        $prof = Professeur::where('email', auth()->user()->email)->first();
        $reclamations = Reclamation::with('professeur', 'professeur.classes', 'eleve')->where('professeur_id', $prof->id)->where('to', 'professeur')->orderBy('created_at', 'DESC')->get();

        return view('prof_views.reclamations.index', compact('reclamations'));
    }

    public function get_parent()
    {
        $parent = Parents::where('email', auth()->user()->email)->first();
        if ($parent) {
            return DB::select('select distinct reclamations.id from reclamations,eleves where reclamations.read=false and reclamations.to="parent" and reclamations.eleve_id=eleves.id and eleves.parent_id=' . $parent->id);
        }
    }

    public function get_prof()
    {
        $prof = Professeur::where('email', auth()->user()->email)->first();
        if ($prof) {
            return DB::select('select * from reclamations where reclamations.read=false and reclamations.to="professeur" and reclamations.professeur_id=' . $prof->id);
        }
    }

    public function create()
    {
        $professeurs = Professeur::all();
        $eleves = Eleve::all();
        return view('reclamations.create', compact('eleves', 'professeurs'));
    }

    public function createByParent()
    {
        $parent = Parents::where('email', auth()->user()->email)->first();
        $professeurs = [];
        /* $professeurs = DB::select('select distinct professeurs.id, professeurs.name, professeurs.matiere_id, professeurs.email, professeurs.role, professeurs.telephone from professeurs, classe_professeur,eleves 
        where professeurs.id=classe_professeur.professeur_id and classe_professeur.classe_id=eleves.classe_id and eleves.parent_id=' . $parent->id); */

        $eleves = Eleve::with('classe')->where('parent_id', $parent->id)->get();
        return view('parent_views.reclamations.create', compact('eleves', 'professeurs'));
    }


    public function createByProf()
    {
        $prof = Professeur::where('email', auth()->user()->email)->first();
        $eleves = Eleve::all();
        return view('prof_views.reclamations.create', compact('eleves', 'prof'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'details' => 'required',
            'eleve_id' => 'required',
            'professeur_id' => 'required',

        ]);
        $reclamation = new Reclamation();
        $reclamation->fill($request->all());
        $reclamation->save();
        return redirect('/reclamations')->with('success', 'Reclamation created successfully!');
    }

    public function showByProf($id)
    {
        $reclamation = Reclamation::with('professeur', 'eleve', 'eleve.parent', 'eleve.classe')->find($id);
        if ($reclamation) {
            return view('prof_views.reclamations.show', compact('reclamation'));
        }
        abort(404);
    }

    public function showByParent($id)
    {
        $reclamation = Reclamation::with('professeur', 'eleve', 'eleve.classe')->find($id);
        if ($reclamation) {
            return view('parent_views.reclamations.show', compact('reclamation'));
        }
        abort(404);
    }

    public function show($id)
    {
        $reclamation = Reclamation::with('professeur', 'eleve')->find($id);
        if ($reclamation) {
            return view('reclamations.show', compact('reclamation'));
        }
        abort(404);
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

    public function editByParent($id)
    {
        $reclamation = Reclamation::with('professeur', 'eleve')->find($id);
        if ($reclamation) {
            return view('parent_views.reclamations.edit', compact('reclamation'));
        }
        abort(404);
    }
    public function editByProf($id)
    {
        $reclamation = Reclamation::find($id);

        $eleves = Eleve::all();
        if ($reclamation) {
            return view('prof_views.reclamations.edit', compact('reclamation', 'eleves'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'details' => 'required',
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
