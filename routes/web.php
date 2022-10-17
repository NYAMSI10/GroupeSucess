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
    return view('main');
})->name('/');
Route::get('Connexion', function () {
    return view('login');
})->name('connexion');

Route::middleware('isAdmin')->group(function () {
Route::prefix('admin')->group(function () {

    Route::get('/Dashboard', function () {
        return view('Home.layout');
    });

Route::resource('/classe', ClasseController::class);

Route::controller(ClasseController::class)->name('classe.')->group(function () {
   
});

Route::controller(MatiereController::class)->name('matiere.')->group(function () {
   
});

Route::controller(TeacherController::class)->name('teacher.')->group(function () {
   
    
});

Route::resource('matiere', MatiereController::class);
Route::resource('teacher', TeacherController::class);

});
});