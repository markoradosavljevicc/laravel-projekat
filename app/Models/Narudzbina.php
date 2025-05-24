<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Narudzbina extends Model
{
    use HasFactory;

    protected $table = 'narudzbine'; // koristi ako tabela nije "narudzbinas" (Laravel pretpostavlja množinu)

    protected $fillable = [
        'user_id',
        'kotlovi_id',
        'kolicina',
        'napomena',
    ];

    // RELACIJE

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kotao()
    {
        return $this->belongsTo(Kotlovi::class, 'kotlovi_id');
    }
}
