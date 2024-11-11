<?php

use Livewire\Livewire;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

if (env('APP_ENV') === 'production') {
    Livewire::setScriptRoute(function ($handle) {
        return Route::get('v-compras/livewire/livewire.js', $handle);
    });

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('v-compras/livewire/update', $handle);
    });
}

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Volt::route('/reserva?{id?}', 'reserva-sala')->name('reserva.sala');

Route::prefix('/sala')->group(function () {
    Volt::route('/', 'sala.lista')->name('sala.index');
    Volt::route('/cadastro', 'sala.cadastro')->name('sala.cadastro');
    // Volt::route('/editar/{id}','editar')->name('editar');
    Volt::route('/editar/{id}','sala.editar')->name('sala.editar');
    Volt::route('/lista','sala.lista')->name('sala.lista');
});



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('');

Route::prefix('/erros')->group(function () {
    Route::view('/403', 'erros.403')->name('erros.403');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
