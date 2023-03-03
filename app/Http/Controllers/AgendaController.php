<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\User;
use App\Notifications\AgendaInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;


class AgendaController extends Controller
{
    //
    public function index()
    {
        return view('agenda.index');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
            'dateTime' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
        ]);

        $formatDate = Carbon::parse($request->dateTime)->format('Y-m-d');

        $agenda = new Agenda;
        $agenda->nama = $request->nama;
        $agenda->tempat = $request->tempat;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->dateTime = $formatDate;
        $agenda->startTime = $request->startTime;
        $agenda->endTime = $request->endTime;
        $agenda->save();

        //notify the user when agenda created 
        $user = User::all();
        Notification::send($user, new AgendaInfo($agenda));
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function view(){
        $agenda = Agenda::all();
        return view('agenda.listagenda', compact('agenda'));
    }
}
