<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Narudzbina;
use App\Models\Kotlovi;
use Illuminate\Support\Facades\Auth;

class NarudzbinaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kotlovi_id' => 'required|exists:kotlovis,id',
            'kolicina' => 'required|integer|min:1',
            'napomena' => 'nullable|string|max:500',
        ]);

        Narudzbina::create([
            'user_id' => Auth::id(),
            'kotlovi_id' => $request->kotlovi_id,
            'kolicina' => $request->kolicina,
            'napomena' => $request->napomena,
        ]);

        return redirect()->route('dashboard')->with('success', 'Narudžbina uspešno kreirana.');
    }


    public function destroy(Narudzbina $narudzbina)
    {
        $narudzbina->delete();
        return redirect()->route('dashboard')->with('success', 'Narudžbina obrisana.');
    }
}
