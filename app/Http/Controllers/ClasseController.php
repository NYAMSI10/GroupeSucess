<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function classe()
    {
        return view('Classe/ajoutez');
    }

    
    public function createclasse(Request $req )
    {
          
          $mat = new Classe([
 
            'nom'=>$req->nom,
          ]);


          $mat->save();
          return redirect('Ajoutez_Classe')->with('sucess', 'Cette Classe a été ajouté avec sucess');

    }

    public function list()
    {
           
         $cla = Classe::all();
        return view('Classe/list', compact('cla'));
    }
}
