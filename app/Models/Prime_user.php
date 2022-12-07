<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime_user extends Model
{
    use HasFactory;

    protected $table = 'prime_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'prime_id',
        'user_id',
        'montant',
        'mois'

    ];
}
