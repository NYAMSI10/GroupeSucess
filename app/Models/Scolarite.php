<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scolarite extends Model
{
    use HasFactory;

    protected $table = 'scolarites';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mois','frais','avance','reste','student_id'

    ];

    public function stuents()
    {
        return $this->belongsTo(Student::class);
    }
}
