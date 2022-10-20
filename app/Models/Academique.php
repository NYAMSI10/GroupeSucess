<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academique extends Model
{
    use HasFactory, Notifiable;



    protected $table = 'academics';
    protected $primaryKey = 'id';

    protected $fillable = [
        'annee'

    ];
}
