<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Faker\Core\File;
use Illuminate\Http\Request;

class ClasseController extends Controller
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
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }


    public function getAll()
    {
        return Classe::all();
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'niveau' => 'required',
            'emploi_elv' => 'mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
        ]);
        $classe = new Classe();
        $classe->fill($request->all());

        if ($request->hasFile('emploi_elv')) {
            $emploi = $request->file('emploi_elv');
            $filename = date('YmdHi') . $emploi->getClientOriginalName();

            $emploi->move(public_path('files'), $filename);
            $classe->emploi_elv = 'files/' . $filename;
        }

        $classe->save();

        return redirect('/classes')->with('success', 'Classe created successfully!');
    }

    public function show($id)
    {
        $classe = Classe::find($id);
        if ($classe) {
            return view('classes.show', compact('classe'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $classe = Classe::find($id);
        if ($classe) {
            return view('classes.edit', compact('classe'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'niveau' => 'required',
            'emploi_elv' => 'mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
        ]);

        $classe = Classe::find($id);
        $classe->fill($request->all());

        if ($request->hasFile('emploi_elv')) {
            $emploi = $request->file('emploi_elv');
            $filename = date('YmdHi') . $emploi->getClientOriginalName();

            $emploi->move(public_path('files'), $filename);
            $classe->emploi_elv = 'files/' . $filename;
        }
        $classe->save();

        return redirect('/classes')->with('success', 'Classe updated successfully!');
    }

    public function destroy($id)
    {
        Classe::destroy($id);
        return redirect('/classes')->with('success', 'Classe deleted successfully!');
    }
}
