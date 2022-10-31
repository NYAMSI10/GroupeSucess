<?php

namespace App\Http\Controllers;

use App\Models\Classeteacher;
use App\Models\Matiereteacher;
use App\Models\Periode;
use App\Models\Periodeteacher;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = user::orderBy('nom', 'asc')->get();

        $periode = Periode::find(1)->users()->orderBy('nom', 'ASC')->get();
        return view('teacher.jour', compact('periode'));
    }

    public function soir()
    {
        //$user = user::orderBy('nom', 'asc')->get();

        $periode = Periode::find(2)->users()->orderBy('nom', 'ASC')->get();
        return view('teacher.soir', compact('periode'));
    }
    public function vacance()
    {
        //$user = user::orderBy('nom', 'asc')->get();

        $periode = Periode::find(3)->users()->orderBy('nom', 'ASC')->get();
        return view('teacher.vacance', compact('periode'));
    }
    public function concour()
    {
        //$user = user::orderBy('nom', 'asc')->get();

        $periode = Periode::find(4)->users()->orderBy('nom', 'ASC')->get();
        return view('teacher.concour', compact('periode'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('teacher.index');
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
                'email' => 'required|unique:users',
                'quartier' => 'required',
                'tel' => 'required|unique:users',


            ],
        );
        function rand($length)
        {

            $chars = "ABCDEFGHI012345JKLMNOPQRSTUVWXYZ6789";
            return substr(str_shuffle($chars), 0, $length);
        }
        $mot = rand(8);
        User::create([

            "nom" => $request->nom,
            "email" => $request->email,
            "quartier" => $request->quartier,
            "tel" => $request->tel,
            "is_admin" => $request->role,
            "password" => Hash::make($mot),
        ]);

        $iduser = \DB::table('users')->where('tel', $request->tel)->value('id');

        foreach ($request->periode as $period) {
            Periodeteacher::create([
                "periode_id" => $period,
                "user_id" => $iduser,
            ]);
        }
        foreach ($request->classe as $classes) {
            classeteacher::create([
                "classe_id" => $classes,
                "user_id" => $iduser,
            ]);
        }

        foreach ($request->matiere as $matieres) {
            matiereteacher::create([
                "matiere_id" => $matieres,
                "user_id" => $iduser,
            ]);
        }

        return redirect()->route('user.index')->with('sucess', 'l\' enseignant a été enregistré avec sucess');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(user $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $classusers = Classeteacher::where('user_id', $user->id)->get();
        $periodusers = Periodeteacher::where('user_id', $user->id)->get();

        $periodes = Periode::all();
        //    $collection = collect([1,2,3,4]);


        $matiereusers = Matiereteacher::where('user_id', $user->id)->get();

        return view('teacher.show', compact('user', 'periodusers', 'classusers', 'periodes', 'matiereusers')); //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'nom' => 'required',
                'email' => 'required',
                'quartier' => 'required',
                'tel' => 'required',


            ],
        );

        $user->update([

            "nom" => $request->nom,
            "email" => $request->email,
            "quartier" => $request->quartier,
            "tel" => $request->tel,
            "is_admin" => $request->role,
        ]);

        /* foreach ($request->periode as $period)
       {
             $idperiode = DB::table('periode_user')->where('id',$period)->value('periode_id');

           $useperiode = DB::table('periode_user')->where('id',$period)->update([

               "periode_id"=>$idperiode,
               "user_id"=>$user->id,
           ]);


       }
      /*

   foreach ($request->classe as $classes)
       {
           classeteacher::create([
               "classe_id"=>$classes,
               "user_id"=>$user->id,
           ]);
       }

       foreach ($request->matiere as $matieres)
       {
           matiereteacher::create([
               "matiere_id"=>$matieres,
               "user_id"=>$user->id,
           ]);
       } */

        return redirect()->route('user.index')->with('sucess', 'les informations ont été modifies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $teacher)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'pass' => 'Mot de passe ou email incorrect ',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('Connexion')->withErrors([
            'pass' => 'Vous Vous etes déconnecté ',
        ]);
    }
}
