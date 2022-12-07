<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;
    protected $table = 'primes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',

    ];


    public function useres()
    {
        return $this->belongsToMany(User::class);
    }
}
