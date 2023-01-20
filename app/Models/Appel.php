<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appel extends Model
{
    use HasFactory;

    protected $table = 'appels';
    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'periode_id',
        'start',
        'end',
        'user_id',
        'matiere_id',
        'classe_id',
      

    ];
}
