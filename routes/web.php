<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\UsulController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HasilUsulController;


Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::resource('role', RoleController::class, ['names' => 'dashboard.role']);

    Route::resource('users', UserController::class, ['names' => 'dashboard.users']);


    //usul
    Route::resource('usul', UsulController::class, ['names' => 'dashboard.usul']);
    Route::post('/usul/status/{usul}', [UsulController::class, 'status'])->name('dashboard.usul.status');
    Route::resource('hasil-usul', HasilUsulController::class, ['names' => 'dashboard.hasil.usul']);

    Route::get('/print/hasil-usul', [HasilUsulController::class, 'print'])->name('print.hasil.usul');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
