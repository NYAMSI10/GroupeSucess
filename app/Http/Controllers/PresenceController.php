<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Mail\Presences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presences = Presence::all();

        return view('presence/index', compact('presences'));
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
        //
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
    public function update(Request $request, Presence $presence)
    {
         $presence->update([

             'start'=>$request->start,
             'end'=> $request->end,
         ]);

         return redirect()->route('presence.index')->with('sucess', 'Horraire modifié avec sucess');
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

    public function accept(Presence $presence)
    {
        $presence->update([

            'accept'=> 1,
        ]);

        $user =[

            "nom" => $presence->user_id,
            "start" => $presence->start,
            "end" => $presence->end,
            "classe" => $presence->classe_id,
            'accept'=> 1,

        ];




        Mail::to(users($user['nom'])->email)->send(new Presences($user));

        return redirect()->route('presence.index')->with('sucess', 'Vous avez confirmer la présence de cet enseignant au cour');
    }
    public function noaccept(Presence $presence)
    {
        $presence->update([

            'accept'=> 0,
        ]);
        $user =[

            "nom" => $presence->user_id,
            "start" => $presence->start,
            "end" => $presence->end,
            "classe" => $presence->classe_id,
            'accept'=> 0,

        ];

        Mail::to(users($user['nom'])->email)->send(new Presences($user));



        return redirect()->route('presence.index')->with('sucess', 'Malheureusement! Vous n\'avez pas confirmer la présence de cet  enseignant');


    }

    public function absence()
    {
        $presences = Presence::where('user_id', auth()->user()->id)->where('accept',0)->get();

        return view('vos_absences', compact('presences'));
    }
    public function editPresence(Presence $presence)
    {
     return view('presence.update', compact('presence'));

    }
}
