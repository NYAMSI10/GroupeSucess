<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $table = 'presences';
    protected $primaryKey = 'id';

    protected $fillable = [

        'start',
        'end',
        'user_id',
        'accept',
        'periode_id',
        'matiere_id',
        'classe_id'

    ];
}
