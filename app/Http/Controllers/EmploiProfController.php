<?php

namespace App\Http\Controllers;

use App\Models\EmploiProf;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EmploiProfController extends Controller
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
        $emplois = EmploiProf::with('professeur')->get();
        return view('emplois_prof.index', compact('emplois'));
    }


    public function create()
    {
        $professeurs = Professeur::all();
        return view('emplois_prof.create', compact('professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
            'professeur_id' => 'required|unique:emploi_profs',

        ]);
        $emploi = new EmploiProf();
        $photo = $request->file('photo');
        $filename = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('files'), $filename);
        $emploi->photo = 'files/' . $filename;
        $emploi->professeur_id = $request->professeur_id;
        $emploi->save();
        return redirect('/emplois_prof')->with('success', 'Emploi created successfully!');
    }

    public function show($id)
    {
        $emploi = EmploiProf::with('professeur')->find($id);
        if ($emploi) {
            return view('emplois_prof.show', compact('emploi'));
        }
        abort(404);
        return view('emplois_prof.show', compact('emploi'));
    }

    public function showByProf()
    {
        $prof = Professeur::with('emploiProf')->where('email', auth()->user()->email)->first();
        if ($prof->emploiProf && $prof->emploiProf->photo) {
            /* url($prof->emploiProf->photo) */
            return redirect("/download/" . $prof->emploiProf->photo);
        }

        return "<html>
                    <head>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1'>

                        <!-- Bootstrap Stylesheet -->
                        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'> 
                    </head>

                    <body class='d-flex flex-column justify-content-center' style='height:100vh;margin:0px'>
                        <h1 style='max-width:70vw; margin: auto; text-align:center'>Vous avez aucun emploi</h1>
                    </body>
                </html>";
    }

    public function edit($id)
    {
        $emploi = EmploiProf::find($id);
        if ($emploi) {
            $professeurs = Professeur::all();
            return view('emplois_prof.edit', compact('professeurs', 'emploi'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:docx,doc,jpeg,png,jpg,gif,pdf,,zip|max:20480',
            //'professeur_id' => 'required|unique:emploi_profs,' . $id,

        ]);
        $emploi = EmploiProf::find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('files'), $filename);
            $emploi->photo = 'files/' . $filename;
        }

        $emploi->professeur_id = $request->professeur_id;
        $emploi->save();
        return redirect('/emplois_prof')->with('success', 'Emploi updated successfully!');
    }

    public function destroy($id)
    {
        EmploiProf::destroy($id);
        return redirect('/emplois_prof')->with('success', 'Emploi deleted successfully!');
    }
}
