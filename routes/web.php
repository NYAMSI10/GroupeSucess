<?php

use App\Http\Controllers\AppelController;
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

Route::controller(\App\Http\Controllers\TestMailController::class)->group(function () {

    Route::get('send', 'email');


});
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

        Route::controller(UserController::class)->name('users.')->group(function () {


                Route::get('compte_utilisateur','listuser')->name('list');
            Route::get('discipline/actif/{user}', 'actif')->name('actif');
            Route::get('discipline/desactif/{user}', 'desactif')->name('desactif');

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
            Route::post('student/recu/{student}','recu')->name('recu');
            Route::get('student/show_frais/{school}','showfrais')->name('showfrais');
            Route::post('student/update_frais/{school}','updatefrais')->name('updatefrais');
            Route::get('student/Delete_frais/{school}','deletefrais')->name('deletefrais');
            Route::get('student/insolvable','insolvable')->name('insolvable');
            //Route::get('student/Reçu_frais/{school}','recufrais')->name('recufrais');



        });

        Route::controller(\App\Http\Controllers\SalaireController::class)->name('salaires.')->group(function () {

            Route::get('teacher/salaire/{user}','salaire')->name('salaire');
            Route::get('teacher/Paiement/{user}','paie')->name('paie');
            Route::post('teacher/Add/{user}','addsalaire')->name('addsalaire');
            Route::get('Bulletin_de_paie/{salaire}', 'bulletinpaie')->name('bulletinpaie');
            //Route::get('student/Reçu_frais/{school}','recufrais')->name('recufrais')
        });

        Route::controller(AppelController::class)->name('appel.')->group(function() {

            Route::get('discipline/classes/{periode}', 'classe')->name('classe');
            Route::get('discipline/liste/{periode}/{classe}', 'list')->name('list');
            Route::get('discipline/liste_des_absents', 'absent')->name('absent');

        });



         // ROUTE RESOURCE
        Route::resource('matiere', MatiereController::class);
        Route::resource('user', UserController::class);
        Route::resource('student', \App\Http\Controllers\StudentController::class);
        Route::resource('primes', \App\Http\Controllers\PrimeController::class);
        Route::resource('salaire', \App\Http\Controllers\SalaireController::class);
        Route::resource('evenements', \App\Http\Controllers\EvenementController::class);
        Route::resource('discipline',AppelController::class);
        Route::resource('profil', \App\Http\Controllers\ProfilController::class);

    });
});
