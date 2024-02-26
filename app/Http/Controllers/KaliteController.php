<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kalite;

class KaliteController extends Controller
{
    public function index()
    {

        $kaliteler=Kalite::orderBy('adi', 'ASC')->where('silindi_mi', 0)->get();

    }
    //Flutter dan gelen verileri kaydetmek için kullanıyoruz
    public function store(Request $request)
    {
        //veriler formdata ile gelir
        $kaliteler = new Kalite();
        $kaliteler->adi = $request->adi;
        $kaliteler->soyadi = $request->soyadi;
        $kaliteler->telefon = $request->telefon;
        $kaliteler->email = $request->email;
        $kaliteler->mesaj = $request->mesaj;
        $kaliteler->silindi_mi = 0;
        $kaliteler->save();
        return response()->json(['success' => 'Başarıyla Kaydedildi']);
    }
}
