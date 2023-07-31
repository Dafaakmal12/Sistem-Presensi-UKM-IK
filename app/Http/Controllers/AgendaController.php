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
            'documentFile' => 'required',
        ]);

        $formatDate = Carbon::parse($request->dateTime)->format('Y-m-d');

        //handle upload file
        $filename = $request->file('documentFile')->getClientOriginalName();
        $request->file('documentFile')->storeAs('public/document', $filename);

        $agenda = new Agenda;
        $agenda->nama = $request->nama;
        $agenda->tempat = $request->tempat;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->dateTime = $formatDate;
        $agenda->startTime = $request->startTime;
        $agenda->endTime = $request->endTime;
        $agenda->documentFile = $filename;
        $agenda->save();
        $notification = [
            'type' => 'success',
            'message' => 'Agenda berhasil ditambahkan',
        ];
    
        $request->session()->flash('notification', $notification);
        
        return redirect('/admin/agenda/list');
        
    }

    public function view(){
        $agenda = Agenda::all();
        return view('agenda.listagenda', compact('agenda'));
    }
    public function updateagenda($id)
    {
        $agenda = Agenda::find($id);
        return view('agenda.updateagenda', compact('agenda'));
    }
    public function updatelistagenda($id, Request $request)
    {
        $agenda = Agenda::find($id);
        $agenda->nama = $request->nama;
        $agenda->tempat = $request->tempat;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->dateTime = $request->dateTime;
        $agenda->startTime = $request->startTime;
        $agenda->endTime = $request->endTime;
        $agenda->save();
        $notification = [
            'type' => 'success',
            'message' => 'Agenda berhasil diupdate',
        ];
    
        $request->session()->flash('notification', $notification);
    
        return redirect('/admin/agenda/list');
        
    }
    public function presensiagenda($id)
    {
        $agenda = Agenda::find($id);
        return view('agenda.presensiagenda', compact('agenda'));
    }
    public function delete($id){
        $agenda = Agenda::find($id);
        $agenda->delete();
        return redirect()->route('agenda.listagenda')->with('success', 'Agenda berhasil dihapus');
    }

    public function download($id){
        $agenda = Agenda::find($id);
        return response()->download(storage_path("app/public/document/{$agenda->documentFile}"));
    }
}
