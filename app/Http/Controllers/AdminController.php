<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
    public function anggotaPresensi()
    {
        return view('admin.anggotaPresensi');
    }
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
    
        return redirect('/admin/anggota');
    }

    public function delete(User $users, $id){
        $users = User::find($id);
        $users->delete();
        return redirect('/admin/list');
    }
}
