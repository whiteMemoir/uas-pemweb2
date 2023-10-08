<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'dashboard']);

Route::get('/', [HomeController::class, 'index'])->name('user.index');

Route::get('/create-karyawan', [HomeController::class, 'create'])->name('user.create');
Route::post('/store-karyawan', [HomeController::class, 'store'])->name('user.store');

Route::get('/edit-karyawan/{id}', [HomeController::class, 'edit'])->name('user.edit');
Route::put('/update-karyawan/{id}', [HomeController::class, 'update'])->name('user.update');

Route::delete('/delete-karyawan/{id}', [HomeController::class, 'delete'])->name('user.delete');


Route::get('/datanasabah', [NasabahController::class, 'index'])->name('client.index');

Route::get('/create-nasabah', [NasabahController::class, 'create'])->name('client.create');
Route::post('/store-nasabah', [NasabahController::class, 'store'])->name('client.store');

Route::get('/edit-nasabah/{id}', [NasabahController::class, 'edit'])->name('client.edit');
Route::put('/update-nasabah/{id}', [NasabahController::class, 'update'])->name('client.update');

Route::delete('/delete-nasabah/{id}', [NasabahController::class, 'delete'])->name('client.delete');



