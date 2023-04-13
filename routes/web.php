<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EmploiDuTempsController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\TableController;

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

Route::get('/', [ProfesseurController::class, 'index'])->name('prof');
Route::get('/salle', [SalleController::class, 'index'])->name('salle');
Route::get('/classe', [ClasseController::class, 'index'])->name('classe');
Route::get('/edt', [EmploiDuTempsController::class, 'index'])->name('edt');
Route::get('/table', [TableController::class, 'index'])->name('table');

Route::post('/', [ProfesseurController::class, 'addProf'])->name('addProf');
Route::post('/editProf', [ProfesseurController::class, 'editProf'])->name('editProf');

Route::post('/classe', [ClasseController::class, 'addClasse'])->name('addClasse');
Route::post('/editClasse', [ClasseController::class, 'editClasse'])->name('editClasse');

Route::post('/salle', [SalleController::class, 'addSalle'])->name('addSalle');
Route::post('/editSalle', [SalleController::class, 'editSalle'])->name('editSalle');

Route::post('/edt', [EmploiDuTempsController::class, 'addEdt'])->name('addEdt');
Route::post('/editEdt', [EmploiDuTempsController::class, 'editEdt'])->name('editEdt');
