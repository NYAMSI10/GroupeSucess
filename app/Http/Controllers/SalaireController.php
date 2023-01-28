<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Periodeteacher;
use App\Models\Prime;
use App\Models\Prime_user;
use App\Models\Salaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaireController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salaire $salaire)
    {
      //echo users($salaire->user_id)->nom;
        $perio = DB::table('periode_user')->where('user_id', $salaire->user_id)->get();

        return view('salaire/showsalaire', compact('salaire','perio') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salaire $salaire)
    {

        $s = 0;
        $i = 0;

        $prixcours = $request->nbrework * $request->mtfrais;

        foreach ($request->prime as $primes) {
            $s = $s + $primes;
        }

        $prixbenef = $prixcours + $request->benefcotistion + $s;

        foreach ($request->events as $event) {
            $i = $i + $event;
        }

        $prixreduct = $request->cotisation + $i + $request->amicale;

        $prixTotal = $prixbenef - $prixreduct;

           $salaire->update([

            'user_id' => $salaire->user_id,
            'periode' => $request->periode,
            'mtfrais' => $request->mtfrais,
            'nbrework' => $request->nbrework,
            'montantsalaire' => $prixTotal,
            'mois' => $request->mois,
            'amical' => $request->amicale,
            'cotisation' => $request->cotisation,
            'benefcotisation' => $request->benefcotistion,

        ]);
        $deleperiod = DB::table('prime_user')->where('user_id', $salaire->user_id)->where('mois',$salaire->mois)->delete();


      $nbre = count($request->prime);

        for ($j = 0; $j < $nbre; $j++) {
            Prime_user::create([
                'user_id' => $salaire->user_id,
                'prime_id' => $request->primes[$j],
                'mois' => $request->mois,
                'montant' => $request->prime[$j],

            ]);

        }

        return redirect()->route('salaires.salaire', $salaire->user_id)->with('sucess', 'le salaire à été modifié');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salaire $salaire)
    {
         $salaire->delete();
        return redirect()->route('salaires.salaire', $salaire->user_id)->with('sucess', 'le salaire à été supprimé ');

    }

    public function salaire(User $user)
    {
        $salaires = Salaire::where('user_id', $user->id)->orderBy('mois', 'ASC')->get();

        return view(
            'salaire/index',
            compact('user', 'salaires')
        );
    }

    public function paie(User $user)
    {
        $perio = DB::table('periode_user')->where('user_id', $user->id)->get();
        $prime = Prime::all();
        $events = Evenement::where('status', 'ongoing')->get();

        return view(
            'salaire/paiesalaire',
            compact('user', 'perio', 'prime', 'events')
        );
    }

    public function addsalaire(User $user, Request $request)
    {


        $s = 0;
        $i = 0;

        $prixcours = $request->nbrework * $request->mtfrais;

        foreach ($request->prime as $primes) {
            $s = $s + $primes;
        }

        $prixbenef = $prixcours + $request->benefcotistion + $s;

        foreach ($request->events as $event) {
            $i = $i + $event;
        }

        $prixreduct = $request->cotisation + $i + $request->amicale;

        $prixTotal = $prixbenef - $prixreduct;

        Salaire::create([

            'user_id' => $user->id,
            'periode' => $request->periode,
            'mtfrais' => $request->mtfrais,
            'nbrework' => $request->nbrework,
            'montantsalaire' => $prixTotal,
            'mois' => $request->mois,
            'amical' => $request->amicale,
            'cotisation' => $request->cotisation,
            'benefcotisation' => $request->benefcotistion,

        ]);

        $nbre = count($request->prime);

        for ($j = 0; $j < $nbre; $j++) {
            Prime_user::create([
                'user_id' => $user->id,
                'prime_id' => $request->primes[$j],
                'mois' => $request->mois,
                'montant' => $request->prime[$j],

            ]);

        }

        return redirect()->route('salaires.salaire', $user->id)->with('sucess', 'le salaire à été sauvegardé ');


    }


    public function bulletinpaie(Salaire $salaire)
    {
      //echo users($salaire->user_id)->nom;
        $perio = DB::table('periode_user')->where('user_id', $salaire->user_id)->get();

        return view('salaire/recu', compact('salaire','perio') );

    }
}
