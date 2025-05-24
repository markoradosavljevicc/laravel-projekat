<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kotlovi;
use App\Models\Servis;
use App\Models\Narudzbina;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $users = null;
        $kotlovi = null;
        $servis = null;
        $narudzbine = null;
        $chartData = [];

        // Admin - korisnici i chart
        if ($user->role && $user->role->name === 'admin') {
            $users = User::with('role')->get();

            // Grupisanje narudžbina po mesecima
            $narudzbinePoMesecima = DB::table('narudzbine')
                ->select(DB::raw('MONTH(created_at) as mesec'), DB::raw('COUNT(*) as broj'))
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get();

            // Priprema podataka za Google Chart
            $chartData[] = ['Mesec', 'Broj narudžbina'];
            foreach ($narudzbinePoMesecima as $red) {
                $mesecIme = Carbon::create()->month($red->mesec)->locale('sr')->translatedFormat('F');
                $chartData[] = [$mesecIme, (int) $red->broj];
            }
        }

        // Editor - kotlovi i servisi
        elseif ($user->role->name === 'editor') {
            $kotlovi = Kotlovi::all();
            $servis = Servis::all();
        }

        // User - narudžbine
        elseif ($user->role->name === 'user') {
            $narudzbine = Narudzbina::with('kotao')->where('user_id', $user->id)->get();
        }

        return view('dashboard', compact('users', 'kotlovi', 'servis', 'narudzbine', 'chartData'));
    }
}
