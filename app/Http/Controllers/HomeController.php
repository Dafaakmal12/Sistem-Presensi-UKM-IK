<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

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
        $date = date('Y-m-d');
        //get lastest agenda from database
        $agenda = Agenda::latest()->first();   
        return view('users.index', compact('date', 'agenda'));
    }

    public function agenda()
    {
        $agenda = Agenda::all();
        // dd($agenda);
        return view('users.listagenda', compact('agenda'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }
}
