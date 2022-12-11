<?php

namespace App\Http\Controllers;

use App\Models\Prime;
use Illuminate\Http\Request;

class PrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $primes = Prime::orderBy('nom', 'asc')->get();

        return view('prime.index' , compact('primes'));
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
              $request->validate([

                  'nom'=>'required|unique:primes'

              ]);

              Prime::create([

                   'nom'=>$request->nom ,
              ]);

              return redirect()->route('primes.index')->with('sucess', 'Cette prime a été crée ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prime $prime)
    {
         return view('prime/show', compact('prime'));
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
    public function update(Request $request, Prime $prime)
    {
                 $prime->update([
                     'nom'=>$request->nom ,
                 ]);
        return redirect()->route('primes.index')->with('sucess', 'Cette prime a été modifiée ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prime $prime)
    {
       $prime->delete();
        return redirect()->route('primes.index')->with('sucess', 'Cette prime a été supprimée ');

    }
}
