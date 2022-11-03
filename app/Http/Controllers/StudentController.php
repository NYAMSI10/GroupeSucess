<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //$students = Student::all();
           $students = Periode::find(1)->students()->get();

           return view('student/jour', compact('students'));
    }
    public function soir()
    {
        $students = Periode::find(2)->students()->get();


        return view('student/soir', compact('students'));
    }

    public function vacance()
    {
        $students = Periode::find(3)->students()->get();

        return view('student/vacance', compact('students'));
    }

    public function concour()
    {
        $students = Periode::find(4)->students()->get();

        return view('student/concour', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return  view('student.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {       $request->validate(
        [
            'nom' => 'required',
            'inscription' => 'required',
            'school' => 'required',
            'quartier' => 'required',
            'classe' => 'required',
            'periode' => 'required',
            'tel' => 'required|unique:students',
        ],
    );


        Student::create([

            "nom" => $request->nom,
            "school" => $request->school,
            "quartier" => $request->quartier,
            "tel" => $request->tel,
            "inscription" => $request->inscription,
            "classe_id" => $request->classe,
            "periode_id" => $request->periode,
            "annee"=>annees(),
        ]);


        return  redirect()->route('student.index')->with('sucess', "l\' élève a été ajouté");


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
}
