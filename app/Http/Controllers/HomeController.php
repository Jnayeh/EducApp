<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case "admin":
                return view('home');
                break;
            case "professeur":
                return redirect('/prof_home');
                break;
            case "parent":
                return redirect('/parent_home');
                break;

            default:
                abort(403);
                break;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_prof()
    {
        return view('users_home.profsHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_parent()
    {
        return view('users_home.parentsHome');
    }
}
