<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\TeacherController;
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
    return view('index');
});

Route::get('Home', function () {
    return view('Home/home');
})->name('Home');


// Teacher 

Route::controller(TeacherController::class)->group(function () {
  
    Route::get('Ajoutez_Enseignant', 'teacher')->name('teacher');
    Route::post('saveteacher', 'createteacher')->name('saveteacher');
    Route::get('Liste/Enseignant/Jour', 'listJour')->name('listJour');
    Route::get('Liste/Enseignant/Soir', 'listSoir')->name('listSoir');
    Route::get('Liste_Enseignant/Vacances', 'listVacances')->name('listVacances');
    Route::get('Liste_Enseignant/Prépa-Concours', 'listprepa')->name('listPrépa-Concours');





});

// matiere 

Route::controller(MatiereController::class)->group(function () {
  
    Route::get('Ajoutez_Matiére', 'matiere')->name('matiere');
    Route::post('save', 'creatematiere')->name('save');
    Route::get('Liste_Matiére', 'list')->name('list');



});

// classe 

Route::controller(ClasseController::class)->group(function () {
  
    Route::get('Ajoutez_Classe', 'classe')->name('classe');
    Route::post('saveclasse', 'createclasse')->name('saveclasse');
    Route::get('Liste_Classe', 'list')->name('liste');


});