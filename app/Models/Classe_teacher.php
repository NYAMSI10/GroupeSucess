<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe_teacher extends Model
{
    use HasFactory;
    protected $table = 'classe_teacher';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idclasse',
        'idteacher',
        
    ];
}
