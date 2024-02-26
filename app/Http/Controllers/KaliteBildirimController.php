<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaliteBildirim;

class KaliteBildirimController extends Controller
{
    public function index()
    {
        $kalitebildirim = KaliteBildirim::orderBy('kalitebildirim_adi', 'ASC')->where('silindi', 0)->get();
        return view('pages.kalite.kalitebildirim', compact('kalitebildirim'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kalitebildirim_adi' => 'required',
        ]);
        $kalitebildirim = new KaliteBildirim;
        $kalitebildirim->kalitebildirim_adi = $request->kalitebildirim_adi;
        $kalitebildirim->save();
    }

    public function destroy($id)
    {
        $kalitebildirim = KaliteBildirim::find($id);
        $kalitebildirim->silindi = 1;
        $kalitebildirim->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }
    public function listele()
    {
        $kalitebildirim = KaliteBildirim::orderBy('kalitebildirim_adi', 'ASC')->where('silindi', 0)->get();
        return response()->json($kalitebildirim);
    }
}
