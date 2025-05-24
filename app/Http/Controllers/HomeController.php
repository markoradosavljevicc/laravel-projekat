<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kotlovi;

class HomeController extends Controller
{
    public function index()
    {
        $istaknuti = Kotlovi::where('featured', 1)->take(3)->get();
        return view('home', compact('istaknuti'));
    }
}
