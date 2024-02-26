<?php

namespace App\Http\Controllers;

use App\Models\Etkinlik;
use App\Models\OkulEtkinlik;
use Illuminate\Http\Request;

class OkulEtkinlikController extends Controller
{
    //etkinlikler fonksiyonu ile çalışıyoruz

    public function okuletkinlik()
    {
        //baslik, baslangic_tarihi, saati, link, resim verilerini getir ve günü geçmiş olanları gösterme
        $etkinlikler = OkulEtkinlik::select('baslik', 'baslangic_tarihi', 'saati', 'link', 'resim')
            ->where('baslangic_tarihi', '>=', date('Y-m-d'))
            ->orderBy('baslangic_tarihi', 'asc')
            ->get();
        return response()->json($etkinlikler);
    }
}
