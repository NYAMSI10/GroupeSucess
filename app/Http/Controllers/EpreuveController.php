<?php

namespace App\Http\Controllers;

use App\Models\Epreuve;
use Illuminate\Http\Request;

class EpreuveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('epreuve.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');
        //  $file_name = $image->getClientOriginalName();
        $imageName = $image->getClientOriginalName();


        Epreuve::create([

            'user_id' => auth()->user()->id,
            'file' => $imageName,
        ]);
        $image->move(public_path('epreuve'), $imageName);

        return response()->json(['success' => $imageName])->with('sucess', 'ok bb');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Epreuve $sujet)
    {
        echo $sujet;
    }


    public function allsujet()
    {

        return view('epreuve.allsujet');
    }

    public function download(Epreuve $sujet)
    {
        $filePath = public_path("epreuve/" . $sujet->file);

        $headers = ['Content-Type: application/pdf'];

        $fileName = $sujet->file;

        return response()->download($filePath, $fileName, $headers);
    }

    public function delete(Epreuve $sujet)
    {
        unlink('epreuve/' . $sujet->file);
        $sujet->delete();

        return redirect()->route('sujet.allsujet')->with('sucess','Epreuve supprimée');
    }

    public function sujets()
    {
        $sujet = Epreuve::where('user_id', auth()->user()->id)->get();

        return view('epreuve.mysujet', compact('sujet'));
    }
    public function sujetsdelete(Epreuve $sujet)
    {
        unlink('epreuve/' . $sujet->file);
        $sujet->delete();

        return redirect()->route('sujet.messujets')->with('sucess','Epreuve supprimée');
    }
}
