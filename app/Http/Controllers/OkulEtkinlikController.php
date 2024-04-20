<?php

namespace App\Http\Controllers;

use App\Models\Etkinlik;
use App\Models\OkulEtkinlik;
use Illuminate\Http\Request;

class OkulEtkinlikController extends Controller
{
    //etkinlikler fonksiyonu ile çalışıyoruz

    public function goruntule()
    {
        $etkinlikler=OkulEtkinlik::orderBy('baslangic_tarihi','desc')->where('silindi',0)->get();
        //JSON formatında verileri döndür
        return response()->json($etkinlikler);
    }
}
