<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;

class ServisController extends Controller
{
    public function index()
    {
        $servisi = Servis::all();
        return view('servisi', compact('servisi'));
    }

    public function create()
    {
        return view('servis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'telefon' => 'required|string|max:20',
            'adresa' => 'required|string|max:255',
            'ikona' => 'nullable|string|max:255',
        ]);

        Servis::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Servis uspešno dodat.');
    }

    public function edit(Servis $servis)
    {
        return view('servis.edit', compact('servis'));
    }

    public function update(Request $request, Servis $servis)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'telefon' => 'required|string|max:20',
            'adresa' => 'required|string|max:255',
            'ikona' => 'nullable|string|max:255',
        ]);

        $servis->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Servis uspešno ažuriran.');
    }

    public function destroy(Servis $servis)
    {
        $servis->delete();

        return redirect()->route('dashboard')->with('success', 'Servis uspešno obrisan.');
    }
}
