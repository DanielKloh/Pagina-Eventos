<?php


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

use App\Http\Controllers\EvntController;


Route::get('/', [EvntController::class, 'index']);
Route::get('/event/create', [EvntController::class, 'createEvent']);
Route::post("/events",[EvntController::class,"store"]);
