<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = Matiere::orderBy('nom', 'asc')->get();
        return view('matiere.index', compact('matiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            $matiere = new Matiere([

                'nom'=>$request->nom,
              ]);


              $matiere->save();
              return redirect()->route('matiere.index')->with('sucess', 'Cette Matiére a été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        return view('matiere.show', compact('matiere'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {

        $request->validate([
            'nom' => 'required',
        ]);
        $matiere->update([
            'nom' => $request->nom,

        ]);
        return redirect()->route('matiere.index')->with('sucess', 'Cette Matiére a été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('matiere.index')->with('sucess', 'Cette Matiére a été supprimé');

    }
}
