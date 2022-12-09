<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
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
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function salaire(User $user)
    {
         $salaires = Salaire::where('user_id',$user->id)->orderBy('mois', 'ASC')->get();

        return view(
            'salaire/index',
          compact('user','salaires')
        );
    }

    public function paie(User $user)
    {
        $perio = DB::table('periode_user')->where('user_id',$user->id)->get();
        $prime = Prime::all();
        $events = Evenement::where('status', 'ongoing')->get();

        return view(
            'salaire/paiesalaire',
            compact('user','perio','prime', 'events')
        );
    }

    public function addsalaire(User $user, Request $request)
    {


        $s = 0 ;
        $i = 0;

        $prixcours = $request->nbrework * $request->mtfrais;

        foreach ($request->prime as $primes)
        {
             $s = $s + $primes ;
        }

        $prixbenef = $prixcours + $request->benefcotistion + $s;

        foreach ($request->events as $event)
        {
            $i = $i + $event ;
        }

        $prixreduct = $request->cotisation + $i + $request->amicale  ;

   $prixTotal = $prixbenef-$prixreduct;

         Salaire::create([

             'user_id'=>$user->id,
             'periode'=>$request->periode,
             'mtfrais'=>$request->mtfrais,
             'nbrework'=>$request->nbrework,
             'montant'=>$prixTotal,
             'mois'=>$request->mois,
             'amical'=>$request->amicale,
             'cotisation'=>$request->cotisation,
             'benefcotisation'=>$request->benefcotistion,

         ]);

         $nbre = count($request->prime);

          for ($j=0 ; $j < $nbre ; $j++)
          {
              Prime_user::create([
                  'user_id'=>$user->id,
                  'prime_id'=>$request->primes[$j],
                  'mois'=>$request->mois,
                  'montant'=>$request->prime[$j],

              ]);

          }

return redirect()->to('salaires.salaire',$user->id)->with('sucess', 'le salaire à été sauvegardé ');


    }
}
