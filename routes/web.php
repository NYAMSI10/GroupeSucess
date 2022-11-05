<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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


Route::controller(\App\Http\Controllers\UserController::class)->name('user.')->group(function () {

    Route::post('save', 'login')->name('save');
    Route::get('logout', 'logout')->name('logout');


});


// route de l'administrateur
Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/Dashboard', function () {
            return view('Home.layout');
        })->name('dashboard');

        Route::resource('/classe', ClasseController::class);

        Route::controller(ClasseController::class)->name('classe.')->group(function () {


        });

        Route::controller(MatiereController::class)->name('matiere.')->group(function () {

        });

        Route::controller(UserController::class)->name('users.')->group(function () {

        Route::get('user/soir','soir')->name('soir');
        Route::get('user/vacance','vacance')->name('vacance');
        Route::get('user/prepa-concours','concour')->name('concour');

        });

        Route::controller(StudentController::class)->name('students.')->group(function () {

            Route::get('student/soir','soir')->name('soir');
            Route::get('student/vacance','vacance')->name('vacance');
            Route::get('student/prepa-concours','concour')->name('concour');
            Route::get('student/frais_de_cours/{student}','frais')->name('frais');
            Route::get('student/Paiement/{student}','paie')->name('paie');


        });

        Route::resource('matiere', MatiereController::class);
        Route::resource('user', UserController::class);
        Route::resource('student', \App\Http\Controllers\StudentController::class);

    });
});
