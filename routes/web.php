<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\epreuvesController;
use App\Http\Controllers\matieresController;
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

// Route::get('/template', function () {
//     return view('template');
// });

Route::get('/', function () {
    return view('index');
});
Route::get('/epreuve', function () {
    return view('epreuve');
});
Route::get('/matiere', function () {
    return view('matiere');
});

Route::get('/affEpreuves', [epreuvesController::class, 'index']);
Route::put('/affEpreuves/add', [epreuvesController::class, 'store']);
Route::put('/affEpreuves/edit/{id}', [epreuvesController::class, 'update']);
Route::delete('/affEpreuves/delete/{id}', [epreuvesController::class, 'destroy']);



Route::get('/affMatieres', [matieresController::class, 'index']);
Route::put('/affMatieres/add', [matieresController::class, 'store']);
Route::put('/affMatieres/edit/{id}', [matieresController::class, 'update']);
Route::delete('/affMatieres/delete/{id}', [matieresController::class, 'destroy']);
