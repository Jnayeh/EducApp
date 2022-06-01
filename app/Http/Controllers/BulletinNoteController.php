<?php

namespace App\Http\Controllers;

use App\Models\BulletinNote;
use App\Models\Eleve;
use App\Models\Parents;
use Illuminate\Http\Request;

class BulletinNoteController extends Controller
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
        $bulletins = BulletinNote::with('eleve')->get();
        return view('bulletins.index', compact('bulletins'));
    }

    public function index_parent()
    {
        $parent = Parents::where('email', auth()->user()->email)->first();
        $bulletins = BulletinNote::with('eleve', 'eleve.parent')->get();
        return view('parent_views.bulletins.index', compact('bulletins', 'parent'));
    }

    public function create()
    {
        $eleves = Eleve::all();
        return view('bulletins.create', compact('eleves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulletin' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eleve_id' => 'required|unique:bulletin_notes',

        ]);
        $bulletin = new BulletinNote();
        $photo_bulletin = $request->file('bulletin');
        $filename = date('YmdHi') . $photo_bulletin->getClientOriginalName();
        $photo_bulletin->move(public_path('files'), $filename);
        $bulletin->bulletin = 'files/' . $filename;
        $bulletin->eleve_id = $request->eleve_id;
        $bulletin->save();
        return redirect('/bulletins')->with('success', 'Bulletin created successfully!');
    }

    public function show($id)
    {
        $bulletin = BulletinNote::with('eleve')->find($id);
        if ($bulletin) {
            return view('bulletins.show', compact('bulletin'));
        }
        abort(404);
    }


    public function edit($id)
    {
        $bulletin = BulletinNote::find($id);
        if ($bulletin) {
            return view('bulletins.edit', compact('eleves', 'bulletin'));
        }
        abort(404);
        $eleves = Eleve::all();
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'bulletin' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eleve_id' => 'required|unique:bulletin_notes,' . $id,

        ]);
        $bulletin = BulletinNote::find($id);
        if ($request->hasFile('bulletin')) {
            $photo_bulletin = $request->file('bulletin');
            $filename = date('YmdHi') . $photo_bulletin->getClientOriginalName();
            $photo_bulletin->move(public_path('files'), $filename);
            $bulletin->bulletin = 'files/' . $filename;
        }

        $bulletin->eleve_id = $request->eleve_id;
        $bulletin->save();
        return redirect('/bulletins')->with('success', 'Bulletin updated successfully!');
    }

    public function destroy($id)
    {
        BulletinNote::destroy($id);
        return redirect('/bulletins')->with('success', 'Bulletin deleted successfully!');
    }
}
