<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendancesController extends Controller
{
    //
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data attendance',
            'data' => $attendances
        ], 200);
    }
    public function show($id)
    {
        $attendance = Attendance::with('user', 'event')->where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data attendance',
            'data' => $attendance
        ], 200);
    }

    public function store(Request $request)
    {
        $id_user = Auth::id();
        $attendance = Attendance::create([
            'id_event' => $request->id_event,
            'id_user' => $id_user,
            'isAttend' => "Hadir",
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }
}
