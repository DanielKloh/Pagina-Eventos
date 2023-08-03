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
Route::get('/event/create', [EvntController::class, 'createEvent'])->middleware("auth");
Route::get('/event/{id}', [EvntController::class, 'show']);
Route::post("/events",[EvntController::class,"store"]);

Route::delete("/event/{id}",[EvntController::class,"destroy"])->middleware("auth");
Route::get('/event/edit/{id}', [EvntController::class, 'edit'])->middleware("auth");
Route::put('/event/update/{id}', [EvntController::class, 'update'])->middleware("auth");
Route::post("/event/join/{id}",[EvntController::class, "joinEvent"])->middleware("auth");


Route::get("/dashboard",[EvntController::class, "dashboard"])->middleware("auth");
