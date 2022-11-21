<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\epreuvesController;
use App\Http\Controllers\matieresController;
use App\Http\Controllers\Epreuve2Controller;
use App\Http\Controllers\Matiere2Controller;
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


// Route::get('/affEpreuves', [epreuvesController::class, 'index']);
// Route::put('/affEpreuves/add', [epreuvesController::class, 'store']);
// Route::put('/affEpreuves/edit/{id}', [epreuvesController::class, 'update']);
// Route::delete('/affEpreuves/delete/{id}', [epreuvesController::class, 'destroy']);



// Route::get('/affMatieres', [matieresController::class, 'index']);
// Route::put('/affMatieres/add', [matieresController::class, 'store']);
// Route::put('/affMatieres/edit/{id}', [matieresController::class, 'update']);
// Route::delete('/affMatieres/delete/{id}', [matieresController::class, 'destroy']);


// Route::get('/affEpreuves', [Epreuve2Controller::class, 'index']);
// Route::put('/affEpreuves/add', [Epreuve2Controller::class, 'store']);
// Route::put('/affEpreuves/edit/{id}', [Epreuve2Controller::class, 'update']);
// Route::resource('/affEpreuves/delete/{id}', [Epreuve2Controller::class, 'destroy']);
Route::resource('/affEpreuves',Epreuve2Controller::class);



// Route::get('/affMatieres', [Matiere2Controller::class, 'index']);
// Route::put('/affMatieres/add', [Matiere2Controller::class, 'store']);
// Route::put('/affMatieres/edit/{id}', [Matiere2Controller::class, 'update']);
// Route::delete('/affMatieres/delete/{id}', [Matiere2Controller::class, 'destroy']);
Route::resource('affMatieres',Matiere2Controller::class);