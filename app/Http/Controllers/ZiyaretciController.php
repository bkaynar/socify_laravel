<?php

namespace App\Http\Controllers;

use App\Models\ZiyaretciModel;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ZiyaretciController extends Controller
{
    public function index()
    {
        // Bugünün tarihini al
        $bugun = Carbon::now()->toDateString();

        // Bugün için bir ziyaretçi kaydı var mı kontrol et
        $ziyaretciKaydi = ZiyaretciModel::whereDate('created_at', $bugun)->first();

        // Eğer bugün için bir kayıt yoksa, yeni bir kayıt oluştur
        if (!$ziyaretciKaydi) {
            $ziyaretciKaydi = new ZiyaretciModel();
            $ziyaretciKaydi->visitor_count = 1;
            $ziyaretciKaydi->save();
        } else {
            // Eğer bugün için bir kayıt varsa, ziyaretçi sayısını artır
            $ziyaretciKaydi->visitor_count++;
            $ziyaretciKaydi->save();
        }

        // Ziyaretçi sayısını döndür
        return response()->json(['ziyaret_sayisi' => $ziyaretciKaydi->visitor_count]);
    }
}
