<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Parents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EleveController extends Controller
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
        $eleves = Eleve::with('classe', 'parent')->get();
        return view('eleves.index', compact('eleves'));
    }

    public function create()
    {
        /* parents pour select */
        $parents = Parents::all();
        $classes = Classe::all();
        return view('eleves.create', compact('parents', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['nullable', 'integer', 'regex:/[0-9]{8}/'],
        ]);
        $eleve = new Eleve();
        $eleve->fill($request->all());
        $hashedpassword = Hash::make($request->password);

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hashedpassword,
                'telephone' => $request->telephone,
                'role' => $request->role
            ]
        );
        $eleve->password = $hashedpassword;
        $eleve->save();
        return redirect('/eleves')->with('success', 'Eleve created successfully!');
    }

    public function show($id)
    {
        $eleve = Eleve::with('classe', 'parent')->find($id);
        if ($eleve) {
            return view('eleves.show', compact('eleve'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $eleve = Eleve::find($id);
        if ($eleve) {
            /* list pour select */
            $parents = Parents::all();
            $classes = Classe::all();
            return view('eleves.edit')->with(compact('eleve', 'parents', 'classes'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $eleve = Eleve::find($id);
        $user = User::where('email', $eleve->email)->first();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'telephone' => 'nullable|integer|regex:/^(\d{8}?)$/',
        ]);

        $hashedpassword = $eleve->password;

        if ($request->password) {
            $hashedpassword = Hash::make($request->password);
        }

        $user->fill($request->all());
        $user->password = $hashedpassword;
        $user->save();

        $eleve->fill($request->all());
        $eleve->password = $hashedpassword;
        $eleve->save();
        return redirect('/eleves')->with('success', 'Eleve updated successfully!');
    }

    public function destroy($id)
    {
        Eleve::destroy($id);
        return redirect('/eleves')->with('success', 'Eleve deleted successfully!');
    }
}
