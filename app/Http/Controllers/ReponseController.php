<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\HomeWork;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function index()
    {
        $reponses = Reponse::with('homeWork', 'eleve')->get();
        return view('reponses.index', compact('reponses'));
    }


    public function create()
    {
        $homeWorks = HomeWork::all();
        $eleves = Eleve::all();
        return view('reponses.create', compact('eleves', 'homeWorks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eleve_id' => 'required',
            'home_work_id' => 'required',

        ]);
        $reponse = new Reponse();
        $reponse->fill($request->all());
        $photo = $request->file('photo');
        $filename = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('files'), $filename);
        $reponse->photo = 'files/' . $filename;
        $reponse->save();
        return redirect('/reponses')->with('success', 'Reponse created successfully!');
    }

    public function show($id)
    {
        $reponse = Reponse::with('homeWork', 'eleve')->find($id);
        if ($reponse) {
            return view('reponses.show', compact('reponse'));
        }
        abort(404);
    }

    public function showByEleve($id)
    {
        return Reponse::with('eleve')->where('eleve_id', $id)->first();
    }

    public function showByHomeWork($id)
    {
        return Reponse::with('homeWork')->where('home_work_id', $id)->get();
    }

    public function edit($id)
    {
        $reponse = Reponse::find($id);

        if ($reponse) {
            $homeWorks = HomeWork::all();
            $eleves = Eleve::all();
            return view('reponses.edit', compact('homeWorks', 'eleves', 'reponse'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eleve_id' => 'required',
            'home_work_id' => 'required',

        ]);
        $reponse = Reponse::find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('files'), $filename);
            $reponse->photo = 'files/' . $filename;
        }

        $reponse->home_work_id = $request->home_work_id;
        $reponse->eleve_id = $request->eleve_id;
        $reponse->save();
        return redirect('/reponses')->with('success', 'Reponse updated successfully!');
    }

    public function destroy($id)
    {
        Reponse::destroy($id);
        return redirect('/reponses')->with('success', 'Reponse deleted successfully!');
    }
}
