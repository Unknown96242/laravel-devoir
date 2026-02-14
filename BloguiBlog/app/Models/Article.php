<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        "titre",
        "contenu",
        "statut",
        'categorie_id',
    ];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
