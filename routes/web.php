<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{SupportController};

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

// Route::controller(SupportController::class)->group(function () {
//     Route::get('/supports', 'index')->name('supports.index');
//     Route::post('/supports', 'store')->name('supports.store');
//     Route::get('/supports/create', 'create')->name('supports.create');
//     Route::get('/supports/{id}/edit', 'edit')->name('supports.edit');
//     Route::get('/supports/{id}/show', 'show')->name('supports.show');
//     Route::put('/supports/{id}/update', 'update')->name('supports.update');
//     Route::delete('/supports/{id}', 'destroy')->name('supports.destroy');
// });
Route::get('/', function () {
    return redirect()->route('supports.index');
});

//Rotas Support
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/{id}/show', [SupportController::class, 'show'])->name('supports.show');
Route::put('/supports/{id}/update', [SupportController::class, 'update'])->name('supports.update');





// Route::get('/contato', function () {
//     return view('site.contact');
// });

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');