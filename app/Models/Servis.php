<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    // Ako se tvoja tabela ne zove 'servis', već npr. 'servisi', ovo je obavezno
    protected $table = 'servis';

    // Atributi koje možeš masovno dodeliti (mass assignment)
    protected $fillable = [
        'naziv',
        'opis',
        'telefon',
        'adresa',
        'ikona'
    ];
}
