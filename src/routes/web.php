<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', [UserController::class, 'index']);

Route::controller(GoalController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/goals', 'store')->name('store');
    Route::get('/goals/create', 'create')->name('create');
    Route::get('/goals/{goal}', 'show')->name('show');
    Route::put('/goals/{goal}', 'update')->name('update');
    Route::delete('/goals/{goal}', 'delete')->name('delete');
    Route::get('/goals/{goal}/edit', 'edit')->name('edit');
});

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/index', [GoalController::class, 'index'])->name('index');

Route::get('/dashboards', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
