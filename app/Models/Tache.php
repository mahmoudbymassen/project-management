<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'est_terminee',
        'projet_id',
    ];

    // Relation avec le modèle Projet
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}