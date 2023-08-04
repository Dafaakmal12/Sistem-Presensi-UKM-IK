<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;

class AdminController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        
        return view('admin.index', compact('date'));
        
    }
    
    public function anggota()
    {
        return view('admin.anggota');
        
        
    }
    public function update(User $users, $id)
    {
        $users = User::find($id);
        return view('admin.update', compact('users'));
        
    }
    public function updateanggota(User $users, $id, Request $request)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->fakultas = $request->fakultas;  
        $users->jurusan = $request->jurusan;
        $users->nra = $request->nra;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        $notification = [
            'type' => 'success',
            'message' => 'Anggota berhasil diupdate',
        ];
    
        $request->session()->flash('notification', $notification);
    
        return redirect('/admin/list');
        
        
    }
    public function attendance()
    {
        // You can return the view for the attendance page here
        $agenda = Agenda::with('attendance.user')->get();
        return view('admin.attendance', compact('agenda'));
    
    }
    public function attendanceUserList($id)
    {
        // You can return the view for the attendance page here
        $agenda = Agenda::with('attendance.user')->find($id);
        return view('admin.attendance', compact('agenda'));
    }
    // public function anggotaPresensi()
    // {
    //     return view('admin.anggotaPresensi');
    // }
    
    public function anggotaList()
    {
        $users = User::all();
        return view('admin.listanggota', compact('users'));
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'nra' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        User::create([
            'name' => $request->name,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'nra' => $request->nra,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $notification = [
            'type' => 'success',
            'message' => 'Anggota berhasil ditambahkan',
        ];
    
        $request->session()->flash('notification', $notification);
    
        return redirect('/admin/list');
    }

    public function delete(User $users, $id){
        $users = User::find($id);
        $users->delete();
        return redirect('/admin/list');
    }

    public function exportToExcel($id_event)
    {
        // get agenda name by id
        $agenda = Agenda::find($id_event);
        return Excel::download(new AttendanceExport($id_event), $agenda->nama.'attendance.xlsx');
    }
}