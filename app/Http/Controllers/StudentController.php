<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Periode;
use App\Models\Scolarite;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $students = Periode::find(1)->students()->orderBy('nom', 'ASC')->get();

        return view('student/jour', compact('students'));
    }

    public function soir()
    {
        $students = Periode::find(2)->students()->orderBy('nom', 'ASC')->get();


        return view('student/soir', compact('students'));
    }

    public function vacance()
    {
        $students = Periode::find(3)->students()->orderBy('nom', 'ASC')->get();

        return view('student/vacance', compact('students'));
    }

    public function concour()
    {
        $students = Periode::find(4)->students()->orderBy('nom', 'ASC')->get();

        return view('student/concour', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $request->validate(
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
            "annee" => annees(),
        ]);

        if ($request->periode == 1) {
            return redirect()->route('student.index')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 2) {
            return redirect()->route('students.soir')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 3) {
            return redirect()->route('students.vacance')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 4) {
            return redirect()->route('students.concour')->with('sucess', "l\' élève a été ajouté");

        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $idclasses = Classe::find($student->classe_id);
        $idperiodes = Periode::find($student->periode_id);


        return view('student.show', compact('student', 'idclasses', 'idperiodes'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate(
            [
                'nom' => 'required',
                'inscription' => 'required',
                'school' => 'required',
                'quartier' => 'required',
                'classe' => 'required',
                'periode' => 'required',
                'tel' => 'required|',
            ],
        );


        $student->update([

            "nom" => $request->nom,
            "school" => $request->school,
            "quartier" => $request->quartier,
            "tel" => $request->tel,
            "inscription" => $request->inscription,
            "classe_id" => $request->classe,
            "periode_id" => $request->periode,

        ]);

        if ($request->periode == 1) {
            return redirect()->route('student.index')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 2) {
            return redirect()->route('students.soir')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 3) {
            return redirect()->route('students.vacance')->with('sucess', "l\' élève a été ajouté");

        } elseif ($request->periode == 4) {
            return redirect()->route('students.concour')->with('sucess', "l\' élève a été ajouté");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('sucess', "l\' élève a été supprimé ");

    }


    /*
     *    Controller pour les frais de cours des élèves
     */

    public function frais(Student $student)
    {
        $students = Student::find($student->id)->scolarites;
        $classe = Classe::find($student->classe_id);


        return view('student/fraiscours', compact('student', 'students', 'classe'));
    }

    public function paie(Student $student)
    {
        return view('student/paiecours', compact('student'));
    }

    public function recu(Student $student, Request $request)
    {

        $request->validate(
            [
                'frais' => 'required',
                'mois' => 'required',
                'avance' => 'required',

            ],
        );

        $reste = $request->frais - $request->avance;

        Scolarite::create([
            "student_id" => $student->id,
            "mois" => $request->mois,
            "frais" => $request->frais,
            "avance" => $request->avance,
            "reste" => $reste,


        ]);

        return redirect()->route('students.frais', $student->id)->with('sucess', "le paiement a été ajouter avec sucess");

    }
    public  function showfrais(Scolarite $school)
    {


          $student = Student::find($school->student_id);

         return view('student/showfrais', compact('school','student'));

    }

    public  function updatefrais(Scolarite $school, Request $request)
    {

         $idstudent = DB::table('scolarites')->where('id', $school->id)->value('student_id');

        $reste = $request->frais - $request->avance;

        $school->update([

            "mois" => $request->mois,
            "frais" => $request->frais,
            "avance" => $request->avance,
            "reste" => $reste,


        ]);

        return redirect()->route('students.frais', $idstudent)->with('sucess', "les informations du  paiement a été modifieés avec sucess ");


    }
    public  function deletefrais(Scolarite $school)
    {


       $school->delete();

        return redirect()->route('students.frais', $school->student_id)->with('sucess', "Ce paiement a été supprimé avec sucess");

    }

    public  function insolvable()
    {

   $insol = Scolarite::where('reste','!=', 0)->get();

        return view('student/insolvable',compact('insol'));

    }
}
