<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;



    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'annee','nom','classe_id','quartier','school','periode_id','tel','inscription'

    ];

     public function clas()
     {
         return $this->belongsTo(Classe::class);
     }

    public function periodes()
    {
        return $this->belongsTo(Periode::class);
    }
    public  function  scolarites()
    {
        return $this->hasMany(Scolarite::class);
    }

}
