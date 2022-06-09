<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\HomeWork;
use App\Models\Parents;
use App\Models\Professeur;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeWorkController extends Controller
{
    public function index()
    {
        $home_works = HomeWork::with('professeur')->get();
        return view('homeworks.index', compact('home_works'));
    }

    public function index_parent()
    {
        $notifs = $this->get_parent();
        foreach ($notifs as $notif) {

            HomeWork::where('id', $notif->id)
                ->update(['read' => 1]);
        }

        /* $unfiltered_home_works = HomeWork::with('professeur', 'classes', 'classes.eleves')->orderBy('created_at', 'DESC')->get();
 */
        $parent = Parents::where('email', auth()->user()->email)->first();
        $home_works = DB::select(
            'select home_works.id, home_works.photo, home_works.created_at, 
            eleves.name as eleve_name, eleves.firstname as eleve_firstname, eleves.id as eleve_id, 
            professeurs.name as professeur_name, professeurs.firstname as professeur_firstname,
            matieres.nom as professeur_matiere_nom
            from home_works, classe_home_work,eleves, professeurs,matieres
            where home_works.professeur_id=professeurs.id
            and professeurs.matiere_id=matieres.id
            and home_works.id=classe_home_work.home_work_id 
            and classe_home_work.classe_id=eleves.classe_id 
            and eleves.parent_id=' . $parent->id . '
            order by home_works.created_at DESC'
        );
        /* $eleves = Eleve::with('reponses', 'classe')->where('parent_id', $parent->id)->get();

        $home_works = [];
        foreach ($unfiltered_home_works as $home_work) {
            foreach ($eleves as $eleve) {
                if ($home_work->classes->contains($eleve->classe)) {
                    $home_work->eleve = $eleve;
                    array_push($home_works, $home_work);
                }
            }
        } */

        return view('parent_views.homeworks.index', compact('home_works'));
    }

    public function index_prof()
    {
        /* $notifs = $this->get_prof();
        foreach ($notifs as $notif) {

            HomeWork::where('id', $notif->id)
                ->update(['read' => 1]);
        } */
        $prof = Professeur::where('email', auth()->user()->email)->first();
        $home_works = HomeWork::with('professeur', 'professeur.classes')->where('professeur_id', $prof->id)->orderBy('created_at', 'DESC')->get();

        return view('prof_views.homeworks.index', compact('home_works'));
    }

    public function get_parent()
    {
        $parent = Parents::where('email', auth()->user()->email)->first();
        if ($parent) {
            return DB::select('select distinct home_works.id, home_works.photo from home_works, classe_home_work,eleves 
        where home_works.read=false and home_works.id=classe_home_work.home_work_id and classe_home_work.classe_id=eleves.classe_id and eleves.parent_id=' . $parent->id);
        }
    }

    public function get_prof()
    {
        $prof = Professeur::where('email', auth()->user()->email)->first();
        if ($prof) {
            return DB::select('select reponses.id from reponses,home_works where reponses.read=false and reponses.home_work_id=home_works.id and home_works.professeur_id=' . $prof->id);
        }
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
        $home_work = HomeWork::with('professeur', 'classes', 'reponses', 'reponses.eleve')->find($id);
        $eleves = Eleve::orderBy('classe_id', 'ASC')->get();
        $notifs = $home_work->reponses;
        foreach ($notifs as $notif) {

            Reponse::where('id', $notif->id)
                ->update(['read' => 1]);
        }
        if ($home_work) {
            return view('prof_views.homeworks.show', compact('home_work', 'eleves'));
        }
        abort(404);
    }

    public function createByProf()
    {
        $prof = Professeur::with('classes')->where('email', auth()->user()->email)->first();
        return view('prof_views.homeworks.create', compact('prof'));
    }

    public function create()
    {
        $classes = Classe::all();
        $professeurs = Professeur::all();
        return view('homeworks.create', compact('professeurs', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
            'professeur_id' => 'required',

        ]);
        $home_work = new HomeWork();
        $photo = $request->file('photo');
        $filename = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('files'), $filename);
        $home_work->photo = 'files/' . $filename;
        $home_work->professeur_id = $request->professeur_id;
        $home_work->save();
        $home_work->classes()->attach($request->classes);
        return redirect('/home_works')->with('success', 'HomeWork created successfully!');
    }

    public function show($id)
    {
        $home_work = HomeWork::with('professeur', 'classes')->find($id);
        if ($home_work) {
            return view('homeworks.show', compact('home_work'));
        }
        abort(404);
    }

    public function editByProf($id)
    {
        $prof = Professeur::with('classes')->where('email', auth()->user()->email)->first();
        $home_work = HomeWork::with('classes')->find($id);
        if ($home_work) {
            return view('prof_views.homeworks.edit', compact('home_work', 'prof'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $home_work = HomeWork::with('classes')->find($id);
        if ($home_work) {
            $classes = Classe::all();
            $professeurs = Professeur::all();
            return view('homeworks.edit', compact('professeurs', 'home_work', 'classes'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
            //'professeur_id' => 'required|unique:home_works,' . $id,

        ]);
        $home_work = HomeWork::with('classes')->find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('files'), $filename);
            $home_work->photo = 'files/' . $filename;
        }

        $home_work->professeur_id = $request->professeur_id;
        $home_work->save();
        $home_work->classes()->sync($request->classes);
        return redirect('/home_works')->with('success', 'HomeWork updated successfully!');
    }

    public function destroy($id)
    {
        HomeWork::destroy($id);
        return redirect('/home_works')->with('success', 'HomeWork deleted successfully!');
    }
}
