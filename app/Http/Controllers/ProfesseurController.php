<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\u;

class ProfesseurController extends Controller
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
        $professeurs = Professeur::with('matiere')->get();
        return view('professeurs.index', compact('professeurs'));
    }

    public function get(Request $request)
    {
        return DB::select('select distinct professeurs.id, professeurs.name, professeurs.firstname, professeurs.matiere_id, professeurs.email, professeurs.role, professeurs.telephone from professeurs, classe_professeur,eleves 
        where professeurs.id=classe_professeur.professeur_id and classe_professeur.classe_id=eleves.classe_id and eleves.id=' . $request->eleve_id);
    }

    public function create()
    {
        /* Matieres pour select */
        $matieres = Matiere::all();
        /* Clesses pour checkList */
        $classes = Classe::all();
        return view('professeurs.create', compact('matieres', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'integer', 'regex:/^(\d{8}?)$/'],
            'matiere_id' => ['required'],
        ]);
        $professeur = new Professeur();
        $professeur->fill($request->all());

        $hashedpassword = Hash::make($request->password);

        $user = User::create(
            [
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => $hashedpassword,
                'telephone' => $request->telephone,
                'role' => $request->role
            ]
        );
        $professeur->password = $hashedpassword;
        $professeur->save();
        $professeur->classes()->attach($request->classes);
        return redirect('/professeurs')->with('success', 'Professeur created successfully!');
    }

    public function show($id)
    {
        $professeur = Professeur::with('matiere', 'classes')->find($id);
        if ($professeur) {
            return view('professeurs.show', compact('professeur'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $professeur = Professeur::with('classes')->find($id);
        if ($professeur) {
            $matieres = Matiere::all();
            /* Clesses pour checkList */
            $classes = Classe::all();
            return view('professeurs.edit')->with(compact('professeur', 'matieres', 'classes'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $professeur = Professeur::find($id);
        $user = User::where('email', $professeur->email)->first();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'telephone' => 'required|integer|regex:/^(\d{8}?)$/',
            'matiere_id' => 'required',
        ]);

        $hashedpassword = $professeur->password;

        if ($request->password) {
            $hashedpassword = Hash::make($request->password);
        }
        $user->fill($request->all());
        $user->password = $hashedpassword;
        $user->save();

        $professeur->fill($request->all());
        $professeur->password = $hashedpassword;
        $professeur->save();

        $professeur->classes()->sync($request->classes);
        return redirect('/professeurs')->with('success', 'Professeur updated successfully!');
    }

    public function remove($id)
    {
        Professeur::destroy($id);
        return redirect('/professeurs')->with('success', 'Professeur deleted successfully!');
    }
}
