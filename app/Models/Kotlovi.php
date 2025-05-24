<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kotlovi extends Model
{
    use HasFactory;

    protected $table = 'kotlovis'; // OVDE JE KLJUČ

    protected $fillable = ['naziv', 'opis', 'cena', 'slika', 'featured', 'tip'];

}

