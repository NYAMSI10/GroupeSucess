<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classeteacher extends Model
{
    use HasFactory;
    protected $table = 'classe_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'classe_id',
        'user_id',

    ];
}
