<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/admin', [AdminController::class, 'index'])->name("admin.index");
Route::get('/admin/anggota', [AdminController::class, 'anggota'])->name("admin.anggota");
Route::get('/admin/list', [AdminController::class, 'anggotaList'])->name("admin.listanggota");
Route::post('/admin/create', [AdminController::class, 'create'])->name("admin.anggota.create");
Route::delete('/admin/list/{id}', [AdminController::class, 'delete'])->name("admin.anggota.delete");
Route::get('/admin/agenda', [AgendaController::class, 'index'])->name("agenda.index");
Route::post('/admin/agenda/store', [AgendaController::class, 'store'])->name("agenda.store");
Route::get('/admin/agenda/list', [AgendaController::class, 'view'])->name("agenda.listagenda");
Route::delete('/admin/agenda/list/{id}', [AgendaController::class, 'delete'])->name("agenda.delete");

// welcome route
Route::get('/', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'authenticate'])->name("login.authenticate");

// logout route
Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/user', [HomeController::class, 'index'])->name("users.index");
    Route::get('/user/agenda', [HomeController::class, 'agenda'])->name("users.listagenda");
    Route::get('/user/profile', [HomeController::class, 'profile'])->name("users.profile");
});
