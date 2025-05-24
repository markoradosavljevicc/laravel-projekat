<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kotlovi;

class KotloviController extends Controller
{
    public function index(Request $request)
    {
        $query = Kotlovi::query();

        if ($request->filled('naziv')) {
            $query->where('naziv', 'like', '%' . $request->naziv . '%');
        }

        if ($request->filled('tip')) {
            $query->where('tip', $request->tip);
        }

        if ($request->sort == 'asc') {
            $query->orderBy('cena', 'asc');
        } elseif ($request->sort == 'desc') {
            $query->orderBy('cena', 'desc');
        }

        $kotlovi = $query->get();
        return view('katalog', compact('kotlovi'));
    }

    public function show($id)
    {
        $kotao = Kotlovi::findOrFail($id);
        return view('katalog-prikaz', compact('kotao'));
    }

    public function create()
    {
        return view('kotlovi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'tip' => 'required|string',
            'cena' => 'required|numeric',
            'slika' => 'nullable|image|max:2048',
        ]);

        $kotao = new Kotlovi($request->except('slika'));

        if ($request->hasFile('slika')) {
            $file = $request->file('slika');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/kotlovi', $filename);
            $kotao->slika = $filename;
        }

        $kotao->save();

        return redirect()->route('dashboard')->with('success', 'Kotao dodat.');
    }

    public function edit(Kotlovi $kotlovi)
    {
        return view('kotlovi.edit',  ['kotao' => $kotlovi]);
    }

    public function update(Request $request, Kotlovi $kotlovi)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'tip' => 'required|string',
            'cena' => 'required|numeric',
            'slika' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('slika');

        if ($request->hasFile('slika')) {
            $file = $request->file('slika');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/kotlovi', $filename);
            $data['slika'] = $filename;
        }

        $kotlovi->update($data);

        return redirect()->route('dashboard')->with('success', 'Kotao ažuriran.');
    }

    public function destroy(Kotlovi $kotlovi)
    {
        $kotlovi->delete();
        return redirect()->route('dashboard')->with('success', 'Kotao obrisan.');
    }
}
