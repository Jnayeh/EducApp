<?php

namespace App\Http\Controllers;

use App\Models\HomeWork;
use App\Models\Professeur;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index()
    {
        $home_works = HomeWork::with('professeur')->get();
        return view('homeworks.index', compact('home_works'));
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

    public function showByProf($id)
    {
        return HomeWork::with('professeur')->where('professeur_id', $id)->first();
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
