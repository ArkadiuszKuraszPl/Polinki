<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');

    Route::post('/user/{user}/update-name', [UserController::class, 'updateName']);
    Route::get('/user/{user}/edit-name', function (User $user) {
        return view('user.edit', ['user' => $user]);
    });
    Route::get('/user', [UserController::class, 'index'])->name('user.index'); // Lista użytkowników
    Route::get('/{slug}', [UserController::class, 'show'])->name('user.show'); // Profil użytkownika
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['middleware' => ['role:user|admin']], function () {

    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


