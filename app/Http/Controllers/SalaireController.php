<?php

namespace App\Http\Controllers;

use App\Models\Prime;
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
        return view(
            'salaire/index',
          compact('user')
        );
    }

    public function paie(User $user)
    {
        $perio = DB::table('periode_user')->where('user_id',$user->id)->get();
        $prime = Prime::all();

        return view(
            'salaire/paiesalaire',
            compact('user','perio','prime')
        );
    }

    public function addsalaire(User $user, Request $request)
    {
         $request->validate(
             [

                 'periode' => 'required',
                 'mtfrais' => 'required',
                 'nbrework' => 'required',
                 'montant' => 'required',
                 'mois' => 'required',
                 'amical' => 'required',

             ]
         );
    }
}
