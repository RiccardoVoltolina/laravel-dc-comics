<?php

use Illuminate\Support\Facades\Route;

//Vado a importare i file del PageController e del AdminController

use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\AdminController;

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

//Con le rotte, vado a richiamare il file (PageController o AdminController in questo caso) e chiamiamo la funzione "index"

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

//chiamo tutte le funzioni del admin controller
Route::resource('admin/comics', AdminController::class);





// Route::get('/create', [AdminController::class, 'create'])->name('create');

// Route::get('/store', [AdminController::class, 'store'])->name('store');




