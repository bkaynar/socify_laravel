<?php

namespace App\Http\Controllers;

use App\Models\YurtYemekModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class YurtYemekController extends Controller
{
    public function index()
    {
        //verilerin order by ile sıralanmasını ve 'silindi' bölümünün 0 olmasını ve tarihi geçenleri görmek istemiyoruz
        $yurtyemekler = YurtYemekModel::orderBy('id', 'ASC')->where('silindi_mi', 0)->where('tarih', '>=', date('Y-m-d'))->get();
        return view('pages.yurtyemek.yurtyemek', compact('yurtyemekler'));
    }

    public function store(Request $request)
    {
        //veriler formdata ile gelir
        $yurtyemekler = new YurtYemekModel();
        $yurtyemekler->corba = $request->corba;
        $yurtyemekler->ikinci = $request->ikinci;
        $yurtyemekler->ikincialternatif = $request->ikincialternatif;
        $yurtyemekler->ucuncu = $request->ucuncu;
        $yurtyemekler->dorduncu = $request->dorduncu;
        $yurtyemekler->digeryiyecekler = $request->digeryiyecekler;

        // Tarihi doğru formata dönüştürme
        try {
            $formattedDate = date('Y-m-d', strtotime($request->tarih));
        } catch (\Exception $e) {
            // Hata durumunda yapılacaklar
            dd($e->getMessage()); // Hata mesajını göster
        }

        $yurtyemekler->tarih = $formattedDate;
        $yurtyemekler->sabah_aksam = $request->sabah_aksam;
        $yurtyemekler->silindi_mi = 0;
        //tarih verisi dd/mm/yyyy şeklinde yüklensin
        $yurtyemekler->save();
    }

    public function destroy($id)
    {
        //put ile veriyi alıyoruz
        $yurtyemekler = YurtYemekModel::find($id);
        $yurtyemekler->silindi_mi = 1;
        $yurtyemekler->save();
        //response ile veri döndereceğiz çünkü ajax ile çalışıyoruz sweatalert ile mesaj göstermek için
        return response()->json(['success' => 'Başarıyla Silindi']);
    }
public function bugunkahvalti()
{
    //bugüne ait olan verileri silindi 0 olaranları sabah_aksam alanı 0 olanı çekiyoruz ve sadece corba,ikinci,ikincialternatif,ucuncu,dorduncu,digeryiyecekler çekiyoruz
    $yurtyemekler = YurtYemekModel::where('silindi_mi', 0)->where('tarih', date('Y-m-d'))->where('sabah_aksam', 0)->get(['corba', 'ikinci', 'ikincialternatif', 'ucuncu', 'dorduncu', 'digeryiyecekler']);
    return response()->json($yurtyemekler);
}

public function bugunaksam(){
    //bugüne ait olan verileri silindi 0 olaranları sabah_aksam alanı 1 olanı çekiyoruz ve sadece corba,ikinci,ikincialternatif,ucuncu,dorduncu,digeryiyecekler çekiyoruz
    $yurtyemekler = YurtYemekModel::where('silindi_mi', 0)->where('tarih', date('Y-m-d'))->where('sabah_aksam', 1)->get(['corba', 'ikinci', 'ikincialternatif', 'ucuncu', 'dorduncu', 'digeryiyecekler']);
    return response()->json($yurtyemekler);
}
    public function sabahlistele()
    {
        //verileri silindi 0 olanları çekiyoruz, sabah_aksam alanı 0 olanı , tarih bugün ve bugünden sonraki tarihler olacak şekilde çekiyoruz sadece yemek1,yemek2,yemek3,yemek4 ve tarih verilerini çekiyoruz
        $yurtyemekler = YurtYemekModel::orderBy('tarih', 'ASC')->where('silindi_mi', 0)->where('tarih', '>=', date('Y-m-d'))->where('sabah_aksam', 0)->get(['corba', 'ikinci', 'ikincialternatif', 'ucuncu', 'dorduncu', 'digeryiyecekler', 'tarih']);
        return response()->json($yurtyemekler);
    }

    public function aksamlistele()
    {
        //verileri silindi 0 olanları çekiyoruz, sabah_aksam alanı 1 olanı , tarih bugün ve bugünden sonraki tarihler olacak şekilde çekiyoruz sadece yemek1,yemek2,yemek3,yemek4 ve tarih verilerini çekiyoruz
        $yurtyemekler = YurtYemekModel::orderBy('tarih', 'ASC')->where('silindi_mi', 0)->where('tarih', '>=', date('Y-m-d'))->where('sabah_aksam', 1)->get(['corba', 'ikinci', 'ikincialternatif', 'ucuncu', 'dorduncu', 'digeryiyecekler', 'tarih']);
        return response()->json($yurtyemekler);
    }

}
