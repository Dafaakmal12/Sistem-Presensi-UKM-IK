<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Attendance;

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
         
        //get users from database by id
        $users = User::find($id);
        return view('users.index', compact('users'));
        
    }

    public function agenda()
    {
        $agendas = Agenda::all();
        // Check attendance status for each agenda
    $userId = auth()->id();
    foreach ($agendas as $agenda) {
        $agenda->attendanceStatus = Attendance::where('id_user', $userId)
            ->where('id_event', $agenda->id)
            ->exists();

            $agenda->attendanceStatus = Attendance::where('id_user', $userId)
            ->where('id_event', $agenda->id)
            ->exists();
    }
        // dd($agenda);
        return view('users.listagenda', compact('agendas'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }
}