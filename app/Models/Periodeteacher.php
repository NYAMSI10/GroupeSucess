<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodeteacher extends Model
{
    use HasFactory;
    protected $table = 'periode_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'periode_id',
        'user_id',

    ];
}
