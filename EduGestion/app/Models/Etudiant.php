<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'telephone',
        'date_naissance',
        'statut',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'statut' => 'boolean',
    ];

    /**
     * Méthode de validation pour la création
     */
    public static function validateCreate($data)
    {
        return Validator::make($data, [
            'matricule' => 'required|string|max:50|unique:etudiants,matricule',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:etudiants,email',

            //TODO: mieux gérer le format du téléphone
            'telephone' => 'nullable|string|max:19',
            'date_naissance' => 'required|date|before:today',
            'statut' => 'nullable|boolean',
        ], [
            'matricule.required' => 'Le matricule est obligatoire',
            'matricule.unique' => 'Ce matricule existe déjà',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'Format email invalide',
            'email.unique' => 'Cet email est déjà utilisé',
            'date_naissance.before' => 'La date de naissance doit être dans le passé',
        ]);
    }

    /**
     * Méthode de validation pour la mise à jour
     */
    public static function validateUpdate($data, $id)
    {
        return Validator::make($data, [
            'matricule' => [
                'required',
                'string',
                'max:50',
                Rule::unique('etudiants')->ignore($id)
            ],
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('etudiants')->ignore($id)
            ],

            //TODO: mieux gérer le format du téléphone
            'telephone' => 'nullable|string|max:20',
            'date_naissance' => 'required|date|before:today',
            'statut' => 'nullable|boolean',
        ]);
    }

    /**
     * Messages de validation personnalisés
     */
    public static function messages()
    {
        return [
            'matricule.required' => 'Le matricule est obligatoire',
            'matricule.unique' => 'Ce matricule existe déjà',
            'nom.required' => 'Le nom est obligatoire',
            'prenom.required' => 'Le prénom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'Format email invalide',
            'email.unique' => 'Cet email est déjà utilisé',
            'date_naissance.required' => 'La date de naissance est obligatoire',
            'date_naissance.before' => 'La date de naissance doit être dans le passé',
        ];
    }

}
