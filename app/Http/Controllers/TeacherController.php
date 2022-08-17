<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Classe_teacher;
use App\Models\Matiere;
use App\Models\Matiere_teacher;
use App\Models\Periode;
use App\Models\Periode_teacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
       
    public function teacher()
    {
        $mat = Matiere::all();
        $clas = Classe::all();
        $periode = Periode::all();

        return view('Teacher/ajoutez', compact('mat','clas','periode'));
    }



    public function createteacher(Request $req )
    {
           
function Rand_string( $length ) {

	$chars = "ABCDEFGHI012345JKLMNOPQRSTUVWXYZ6789";
	return substr(str_shuffle($chars),0,$length);

}

$pass = Rand_string(8);

          $nom = $req->nom;
          $email = $req->email;
          $tel = $req->tel;
          $quartier = $req->quartier;
          $classe = $req->classe;
          $matiere = $req->matiere;
          $periode = $req->periode;

           $a =count($classe);
           $b =count($matiere);
           $c =count($periode);

          $teacher = new Teacher([

          'nom'=>$nom,
          'email'=>$email,
          'tel'=>$tel,
          'quartier'=>$quartier,
          'password'=>Hash::make($pass),
          ]
         );
    
    $teacher->save();

    $nomteacher = DB::table('teacher')->where('tel',$tel)->value("nom");


      



          for ($i=0; $i <$a ; $i++) {
               
         $cla = new Classe_teacher([
           
            'nomteacher'=>$nomteacher,
          'nomclasse'=>$classe[$i],
        

         ]);
            
         $cla->save();
                   }


                   for ($i=0; $i <$b ; $i++) {
               
                    $mat = new Matiere_teacher([
                      
                       'nomteacher'=>$nomteacher,
                     'nommatiere'=>$matiere[$i],
                   
           
                    ]);
                       
                    $mat->save();
                              }


                              for ($i=0; $i <$c ; $i++) {
               
                                $period = new Periode_teacher([
                                  
                                   'nomteacher'=>$nomteacher,
                                 'nomperiode'=>$periode[$i],
                               
                       
                                ]);
                                   
                                $period->save();
                                          }

                   return redirect('Ajoutez_Enseignant')->with('sucess', 'Cet enseignant a été ajouté avec sucess'); 

        

    }


    public function listJour()
    {
        $teacher = Teacher::all();
        $clas = Classe_teacher::all();
        $periode = Periode_teacher::all();
        $mat = Matiere_teacher::all();

        

        return view('Teacher/list', compact('mat','clas','periode','teacher'));
    }



    public function listSoir()
    {
        $teacher = Teacher::all();
        $clas = Classe_teacher::all();
        $periode = Periode_teacher::all();
        $mat = Matiere_teacher::all();

        

        return view('Teacher/listsoir', compact('mat','clas','periode','teacher'));
    }


}
