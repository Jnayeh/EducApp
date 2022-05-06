<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EmploiElvController;
use App\Http\Controllers\EmploiProfController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ProfesseurController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['middleware' => ['auth']], function () {
Route::get('/matieres', [MatiereController::class, 'index'])->name('matieres');
Route::get('matieres/create', [MatiereController::class, 'create']);
Route::post('matieres', [MatiereController::class, 'store']);
Route::get('matieres/{id}/edit', [MatiereController::class, 'edit']);
Route::get('matieres/{id}', [MatiereController::class, 'show']);
Route::put('matieres/{id}', [MatiereController::class, 'update']);
Route::delete('matieres/{id}', [MatiereController::class, 'destroy']);

Route::get('/classes', [ClasseController::class, 'index'])->name('classes');
Route::get('classes/create', [ClasseController::class, 'create']);
Route::post('classes', [ClasseController::class, 'store']);
Route::get('classes/{id}/edit', [ClasseController::class, 'edit']);
Route::get('classes/{id}', [ClasseController::class, 'show']);
Route::put('classes/{id}', [ClasseController::class, 'update']);
Route::delete('classes/{id}', [ClasseController::class, 'destroy']);



/* USERS */

Route::get('/professeurs', [ProfesseurController::class, 'index'])->name('professeurs');
Route::get('professeurs/create', [ProfesseurController::class, 'create']);
Route::post('professeurs', [ProfesseurController::class, 'store']);
Route::get('professeurs/{id}/edit', [ProfesseurController::class, 'edit']);
Route::get('professeurs/{id}', [ProfesseurController::class, 'show']);
Route::put('professeurs/{id}', [ProfesseurController::class, 'update']);
Route::delete('professeurs/{id}', [ProfesseurController::class, 'destroy']);

Route::get('/parents', [ParentsController::class, 'index'])->name('parents');
Route::get('parents/create', [ParentsController::class, 'create']);
Route::post('parents', [ParentsController::class, 'store']);
Route::get('parents/{id}/edit', [ParentsController::class, 'edit']);
Route::get('parents/{id}', [ParentsController::class, 'show']);
Route::put('parents/{id}', [ParentsController::class, 'update']);
Route::delete('parents/{id}', [ParentsController::class, 'destroy']);

Route::get('/eleves', [EleveController::class, 'index'])->name('eleves');
Route::get('eleves/create', [EleveController::class, 'create']);
Route::post('eleves', [EleveController::class, 'store']);
Route::get('eleves/{id}/edit', [EleveController::class, 'edit']);
Route::get('eleves/{id}', [EleveController::class, 'show']);
Route::put('eleves/{id}', [EleveController::class, 'update']);
Route::delete('eleves/{id}', [EleveController::class, 'destroy']);

/* EMPLOI PROF */

Route::get('/emplois_prof', [EmploiProfController::class, 'index'])->name('emplois_prof');
Route::get('emplois_prof/create', [EmploiProfController::class, 'create']);
Route::post('emplois_prof', [EmploiProfController::class, 'store']);
Route::get('emplois_prof/{id}/edit', [EmploiProfController::class, 'edit']);
Route::get('emplois_prof/{id}', [EmploiProfController::class, 'show']);
Route::get('professeur/{id}/emplois_prof', [EmploiProfController::class, 'showByProf']);
Route::put('emplois_prof/{id}', [EmploiProfController::class, 'update']);
Route::delete('emplois_prof/{id}', [EmploiProfController::class, 'destroy']);

/* 
Route::get('/emplois_elv', [EmploiElvController::class, 'index'])->name('emplois_elv');
Route::get('emplois_elv/create', [EmploiElvController::class, 'create']);
Route::post('emplois_elv', [EmploiElvController::class, 'store']);
Route::get('emplois_elv/{id}/edit', [EmploiElvController::class, 'edit']);
Route::get('emplois_elv/{id}', [EmploiElvController::class, 'show']);
Route::put('emplois_elv/{id}', [EmploiElvController::class, 'update']);
Route::delete('emplois_elv/{id}', [EmploiElvController::class, 'destroy']);
 */

//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
