<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe = Classe::orderBy('nom', 'asc')->get();
        return view('classe.index', compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req )
    {


    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nom' => 'required',

            ],
        );

         Classe::created([

            'nom'=>$request->nom,
          ]);



          return redirect()->route('classe.index')->with('sucess', 'Cette Classe a été crée');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        return view('classe.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        $request->validate(
            [
                'nom' => 'required',

            ],
        );
        $classe->update([

            'nom'=>$request->nom,
        ]);


        return redirect()->route('classe.index')->with('sucess', 'Cette Classe a été modfiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();

        return redirect()->route('classe.index')->with('sucess', 'Cette Classe a été supprimé');
    }
}
