<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function matiere()
    {
        return view('Matiere/ajoutez');
    }

    public function creatematiere(Request $req )
    {
          
          $mat = new Matiere([
 
            'nom'=>$req->nom,
          ]);


          $mat->save();
     return redirect('Ajoutez_Matiére')->with('sucess', 'Cette matiére a été ajouté avec sucess');
       
    }

    public function list()
    {
           
         $mat = Matiere::all();
        return view('Matiere/list', compact('mat'));
    }

}


