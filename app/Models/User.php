<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'tel',
        'email',
        'quartier',
        'password',
        'role',
        'is_admin',
        'active',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);

    }

    public function clas()
    {

        return $this->belongsToMany(Classe::class);
    }

    public function periodes(){

        return $this->belongsToMany(Periode::class);
    }

    public function primes()
    {
        return $this->belongsToMany(Prime::class);

    }
}
