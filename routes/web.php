<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendancesController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::middleware(['auth', 'role:admin'])->group(function(){
//     Route::get('/admin', [AdminController::class, 'index'])->name("admin.index");
//     Route::get('/admin/anggota', [AdminController::class, 'anggota'])->name("admin.anggota");
//     Route::get('/admin/list', [AdminController::class, 'anggotaList'])->name("admin.listanggota");
//     Route::post('/admin/create', [AdminController::class, 'create'])->name("admin.anggota.create");
//     Route::delete('/admin/list/{id}', [AdminController::class, 'delete'])->name("admin.anggota.delete");
//     Route::get('/admin/agenda', [AgendaController::class, 'index'])->name("agenda.index");
//     Route::post('/admin/agenda/store', [AgendaController::class, 'store'])->name("agenda.store");
//     Route::get('/admin/agenda/list', [AgendaController::class, 'view'])->name("agenda.listagenda");
// });
//admin route
Route::get('/admin', [AdminController::class, 'index'])->name("admin.index");
Route::get('/admin/anggota', [AdminController::class, 'anggota'])->name("admin.anggota");
Route::get('/admin/list', [AdminController::class, 'anggotaList'])->name("admin.listanggota");
Route::post('/admin/create', [AdminController::class, 'create'])->name("admin.anggota.create");
Route::get('/admin/update/{id}', [AdminController::class, 'update'])->name("admin.update");
// Route::get('/admin/presensiagenda', [AdminController::class, 'anggotaPresensi'])->name('presensiagenda');
Route::get('/admin/attendance', [AdminController::class, 'attendance'])->name('admin.attendance');
Route::get('/admin/attendance/{id}', [AdminController::class, 'attendanceUserList'])->name('admin.attendanceDetail');
Route::post('/admin/updateanggota/{id}', [AdminController::class, 'updateanggota'])->name("admin.updateanggota");
Route::delete('/admin/list/{id}', [AdminController::class, 'delete'])->name("admin.anggota.delete");
Route::get('/admin/agenda', [AgendaController::class, 'index'])->name("agenda.index");
Route::post('/admin/agenda', [AgendaController::class, 'index'])->name("agenda.index");
Route::post('/admin/agenda/store', [AgendaController::class, 'store'])->name("agenda.store");
Route::get('/admin/agenda/list', [AgendaController::class, 'view'])->name("agenda.listagenda");
Route::get('/admin/agenda/updateagenda/{id}', [AgendaController::class, 'updateagenda'])->name("agenda.updateagenda");
Route::post('/admin/agenda/updatelistagenda/{id}', [AgendaController::class, 'updatelistagenda'])->name("agenda.updatelistagenda");
// Route::get('/admin/agenda/presensiagenda/{id}', [AgendaController::class, 'presensiagenda'])->name("agenda.presensiagenda");
Route::delete('/admin/agenda/list/{id}', [AgendaController::class, 'delete'])->name("agenda.delete");
//download file
Route::get('/admin/agenda/list/{id}', [AgendaController::class, 'download'])->name("agenda.download");
Route::get('admin/agenda/notification/{id}', [AgendaController::class, 'notification'])->name("agenda.notification");
Route::get('admin/export/{id}', [AdminController::class, 'exportToExcel'])->name('export');


// welcome route
Route::get('/', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'authenticate'])->name("login.authenticate");

// logout route
Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

// user route
Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/user', [HomeController::class, 'index'])->name("users.index");
    Route::get('/user/agenda', [HomeController::class, 'agenda'])->name("users.listagenda");
    Route::get('/user/profile', [HomeController::class, 'profile'])->name("users.profile");
    Route::post('/user/attendance', [AttendancesController::class, 'store'])->name("users.attendance");
});