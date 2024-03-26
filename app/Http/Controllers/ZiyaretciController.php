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
    public function getir(){
        //visitor_count,created_at,updated_at verilerini getir
        $ziyaretciKaydi = ZiyaretciModel::orderBy('id', 'DESC')->get(['visitor_count','created_at','updated_at']);
        //updated_at ve created_at verilerini tarih formatına çevir
        foreach ($ziyaretciKaydi as $ziyaretci){
            //updated_at tarih ve saat olarak alınacak
            $ziyaretci->updated_at = Carbon::parse($ziyaretci->updated_at)->format('d.m.Y H:i:s');
        }
        return view('pages.ziyaretci.ziyaretciler', compact('ziyaretciKaydi'));
    }
}
