<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etkinlik;
use App\Models\Topluluk;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class EtkinlikController extends Controller
{
    public function index()
    {
        $etkinlikler = Etkinlik::orderBy('topluluk_adi', 'ASC')->where('silindi_mi', 0)->get();
        return view('pages.etkinlik.etkinlikler', compact('etkinlikler'));
    }

    public function topluluklar()
    {
        $topluluklar = Topluluk::orderBy('adi', 'ASC')->where('silindi_mi', 0)->get();
        return view('pages.etkinlik.etkinlikekle', compact('topluluklar'));
    }

    public function store(Request $request)
    {
        // Dosyayı kaydetme işlemi
        $imageName = time() . '.' . $request->fotograf->extension();
        $path = public_path('images/etkinlik/' . $imageName);

        // Resmi aç
        $img = Image::make($request->fotograf->getRealPath());
        // Boyutu düşür (örneğin 300x200 piksel)
        $img->resize(300, 300);

        // Resmi kaydet
        $img->save($path);
        // Etkinlik modeli oluşturma ve veritabanına kaydetme işlemi
        $etkinlik = new Etkinlik();
        $etkinlik->adi = $request->adi;
        $etkinlik->topluluk_adi = $request->topluluk_adi;
        $etkinlik->baslangic_tarihi = $request->baslangic_tarihi;
        $etkinlik->bitis_tarihi = $request->bitis_tarihi;

        $etkinlik->silindi_mi = 0;
        $etkinlik->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }

    public function destroy($id)
    {
        //put ile veriyi alıyoruz
        $etkinlikler = Etkinlik::find($id);

        $etkinlikler->silindi_mi = 1;
        $etkinlikler->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

    //seçilen topluluğun etkinliklerini çekiyoruz
    public function etkinlikler($id)
    {
        $etkinlikler = Etkinlik::orderBy('id', 'DESC')->where('silindi_mi', 0)->where('topluluk_id', $id)->get();
        return response()->json($etkinlikler);
    }

    public function tumetkinlikler()
    {
        $etkinlikler = Etkinlik::orderBy('id', 'ASC')->where('silindi_mi', 0)->get();

        $simdikiTarih = Carbon::now();
        $gelecektekiEtkinlikler = [];

        foreach ($etkinlikler as $etkinlik) {
            // Veritabanından çekilen tarih bilgisini doğru bir şekilde analiz et
            $baslangicTarihi = Carbon::createFromFormat('d/m/Y H:i', $etkinlik->baslangic_tarihi);
            $bitisTarihi = Carbon::createFromFormat('d/m/Y H:i', $etkinlik->bitis_tarihi);

            // Geçmiş tarihli etkinlikleri filtrele
            if ($bitisTarihi->isFuture()) {
                // İstenen formata çevir
                $etkinlik->baslangic_tarihi = $baslangicTarihi->format('d/m/Y');
                $etkinlik->bitis_tarihi = $bitisTarihi->format('d/m/Y');

                // Gelecekteki etkinlikleri listeye ekle
                $gelecektekiEtkinlikler[] = $etkinlik;
            }
        }


        return response()->json($gelecektekiEtkinlikler);

    }
}
