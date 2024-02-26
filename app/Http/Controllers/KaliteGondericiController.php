<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaliteGonderici;

class KaliteGondericiController extends Controller
{
    public function index()
    {
        $kalitegonderici = KaliteGonderici::orderBy('kalitegonderici_tipi', 'ASC')->where('silindi', 0)->get();
        return view('pages.kalite.kalitegonderici', compact('kalitegonderici'));
    }

    //store
    public function store(Request $request)
    {
        $kalitegonderici = new KaliteGonderici;
        $kalitegonderici->kalitegonderici_tipi = $request->kalitegonderici_tipi;
        $kalitegonderici->save();
    }

    //listele
    public function listele()
    {
        $kalitegonderici = KaliteGonderici::orderBy('kalitegonderici_tipi', 'ASC')->where('silindi', 0)->get();
        return response()->json($kalitegonderici);
    }

}
