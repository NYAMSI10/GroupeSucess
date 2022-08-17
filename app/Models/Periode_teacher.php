<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode_teacher extends Model
{
    use HasFactory;
    protected $table = 'periode_teacher';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomperiode',
        'nomteacher',
        
    ];
}
