<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiereteacher extends Model
{
    use HasFactory;

    protected $table = 'matiere_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'matiere_id',
        'user_id',

    ];
}
