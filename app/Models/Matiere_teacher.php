<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere_teacher extends Model
{
    use HasFactory;
    
    protected $table = 'matiere_teacher';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idmatiere',
        'idteacher',
        
    ];
}
