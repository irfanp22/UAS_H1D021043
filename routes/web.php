<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('pesanan.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('pesanan', PesananController::class);
    Route::put('{id}/status', [PesananController::class, 'status'])->name('status');
    Route::get('pesanan/completed', [PesananController::class, 'completed'])->name('completed');
    Route::get('pesanan/incomplete', [PesananController::class, 'incomplete'])->name('incomplete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
