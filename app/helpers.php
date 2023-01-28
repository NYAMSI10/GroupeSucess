<?php

use App\Models\Student;

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
if (!function_exists('matiereuserse')) {
    function matiereuserse($a)
    {

        $result=\App\Models\Matiereteacher::where('user_id',$a)->get();
        return $result;
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

    }}

    if (!function_exists('moise')) {
        function moise()
        {

            $collect =['JANVIER'.' '.date("Y"),
                'FEVRIER'.' '.date("Y"), 'MARS'.' '.date("Y"),'AVRIL'.' '.date("Y"), 'MAI'.' '.date("Y"),
                'JUIN'.' '.date("Y"),'JUILLET'.' '.date("Y"),'AOUT'.' '.date("Y"),'SEPTEMBRE'.' '.date("Y"),'OCTOBRE'.' '.date("Y"),
                'NOVEMBRE'.' '.date("Y"),'DECEMBRE'.' '.date("Y"), ];

            return $collect;

        }
}

if (!function_exists('nomperiode')) {
    function nomperiode($a)
    {

        $nomperiod = \App\Models\Periode::find($a);

        return $nomperiod->nom;

    }}

if (!function_exists('users')) {
    function users($id)
    {

        $nomusers = \App\Models\User::find($id);

        return $nomusers;
    }}

if (!function_exists('nommat')) {
    function nommat($id)
    {

        $nommat = \App\Models\Matiere::find($id);

        return $nommat;
    }}

if (!function_exists('primeusers')) {
    function primeusers()
    {

        $primeusers = \App\Models\Prime_user::all();

        return $primeusers;

    }}


if (!function_exists('events')) {
    function events()
    {

        $events = \App\Models\Evenement::all();

        return $events;
    }}

if (!function_exists('primes')) {
    function primes()
    {

        $primes = \App\Models\Prime::all();

        return $primes;
    }}

    if (!function_exists('student')) {
        function student($a)
        {

            $students = Student::find($a);

            return $students;
        }}

if (!function_exists('user')) {
    function user()
    {

        $user = \App\Models\User::all();

        return $user;
    }}
