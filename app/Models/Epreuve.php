<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory;
    protected $table = 'epreuves';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file',
    ];
}
