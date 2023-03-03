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
        return redirect('/admin/anggota')->with('status', 'Anggota berhasil ditambahkan');
    }

    public function delete(User $users, $id){
        $users = User::find($id);
        $users->delete();
        return redirect('/admin/list');
    }
}
