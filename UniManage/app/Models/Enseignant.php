<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Enseignant extends Model
{
     protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'telephone',
        'grade',
        'departement',
        'statut',
    ];

    /**
     * Génère un matricule unique avec le format ISI-ENS-XXXXXXXX
     *
     * @return string
     */
    public static function generateMatricule(): string
    {
        do {
            // Générer un UUID court (8 caractères aléatoires)
            $uuid = strtoupper(Str::random(8));
            $matricule = "ISI-ENS-{$uuid}";
        } while (self::where('matricule', $matricule)->exists());

        return $matricule;
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($enseignant) {
            if (empty($enseignant->matricule)) {
                $enseignant->matricule = self::generateMatricule();
            }
        });
    }

}
