<?php


if (!function_exists('classes')) {
    function classes()
    {
        return \App\Models\Classe::all();
    }
}
if (!function_exists('matieres')) {
    function matieres()
    {
        return \App\Models\Matiere::all();
    }
}
if (!function_exists('periodes')) {
    function periodes()
    {
        return \App\Models\Periode::all();
    }
}

if (!function_exists('periodeusers')) {
    function periodeusers()
    {
        return \App\Models\Periodeteacher::all();
    }
}
if (!function_exists('matiereusers')) {
    function matiereusers()
    {
        return \App\Models\Matiereteacher::all();
    }
}
if (!function_exists('classeusers')) {
    function classeusers()
    {
        return \App\Models\Classeteacher::all();
    }
}
if (!function_exists('annees')) {
    function annees()
    {

        $mois=date("m");

        if ($mois<8) { // avant Août
            $fin=date("Y");
            $debut=$fin-1;
        }
        else {
            $debut=date("Y");
            $fin=$debut+1;
        }
        $datev= $debut.'/'.$fin;

        return $datev;
    }
}
if (!function_exists('nomclas')) {
    function nomclas($a)
    {

         $clas = \App\Models\Classe::find($a);

         return $clas->nom;

    }
}
