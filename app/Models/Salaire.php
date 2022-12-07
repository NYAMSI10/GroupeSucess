<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
    use HasFactory;

    protected $table = 'salaires';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'periode',
        'mtfrais',
        'nbrework',
        'montant',
        'mois',
        'amical'

    ];
}
