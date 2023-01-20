<?php

namespace App\Http\Controllers;

use App\Models\Appel;
use App\Models\Classe;
use App\Models\Periode;
use App\Models\Student;
use Illuminate\Http\Request;

class AppelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view ('discipline/periode');
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

         foreach ($request->absent as $abs) {



          Appel::create([
            'student_id'=>$abs,
            'periode_id'=> $request->periode,
            'start'=>$request->start,
            'end'=>$request->end,
            'user_id'=>auth()->user()->id,
            'matiere_id'=>$request->matiere,
            'classe_id'=>$request->classe,

          ]);

        }

         return redirect()->route('discipline.index')->with('Votre appel a été effectuer');

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


    public function classe(Periode $periode)
    {
            return view ('discipline.classe',compact('periode'));
    }

    public function list(Periode $periode, Classe $classe)
    {
               $students = Student::where('classe_id', $classe->id)->get();

            return view ('discipline.list',compact('periode','students','classe'));
    }

    public  function absent()
    {
         $students = Appel::orderBy('created_at', 'ASC')->get();

         return view('discipline.absence', compact('students'));
    }
}
