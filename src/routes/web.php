<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;   
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
Route::get('/goals/{goal}/edit', [GoalController::class, 'edit']);
Route::delete('/goals/{goal}', [GoalController::class,'delete']);
Route::put('/goals/{goal}', [GoalController::class, 'update']);

Route::get('/goals/create', [GoalController::class, 'create']);
Route::post('/goals', [GoalController::class, 'store']);
Route::get('/goals/{goal}', [GoalController::class ,'show']);
Route::get('/', [GoalController::class, 'index']);

