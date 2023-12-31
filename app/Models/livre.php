<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
     protected $fillable = [
        'titre',
        'auteur',
        'date_pub',
        'maison_edition',
        'langue',
        'livre_image',
        'description',
        'idEtu',
        'disponible',
        'dateEmprunt',
        'dateRemise',
        'nbreEmprunt',
        'qte',
    ];
}
