<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentsController extends Controller
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
        $parents = Parents::get();
        return view('parents.index', compact('parents'));
    }

    public function create()
    {
        return view('parents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'integer', 'regex:/^(\d{8}?)$/'],
        ]);
        $parent = new Parents();

        $parent->fill($request->all());
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
        $parent->password = $hashedpassword;
        $parent->save();
        return redirect('/parents')->with('success', 'Parent created successfully!');
    }

    public function show($id)
    {
        $parent = Parents::find($id);
        if ($parent) {
            return view('parents.show', compact('parent'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $parent = Parents::find($id);
        if ($parent) {
            return view('parents.edit')->with(compact('parent'));
        }
        abort(404);
    }

    public function update($id, Request $request)
    {
        $parent = Parents::find($id);
        $user = User::where('email', $parent->email)->first();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'telephone' => 'required|integer|regex:/^(\d{8}?)$/',
        ]);

        $hashedpassword = $parent->password;

        if ($request->password) {
            $hashedpassword = Hash::make($request->password);
        }

        $user->fill($request->all());
        $user->password = $hashedpassword;
        $user->save();

        $parent->fill($request->all());
        $parent->password = $hashedpassword;
        $parent->save();
        return redirect('/parents')->with('success', 'Parent updated successfully!');
    }

    public function destroy($id)
    {
        Parents::destroy($id);
        return redirect('/parents')->with('success', 'Parent deleted successfully!');
    }
}
