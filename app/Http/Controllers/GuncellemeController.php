<?php

namespace App\Http\Controllers;

use App\Models\GuncellemeModel;
use Illuminate\Http\Request;

class GuncellemeController extends Controller
{
    //Güncelleme listeleme

    public function guncelleme()
    {
        //silindi 0 olanları getir ve sadece android,android_check,playstore_link, kolonlarını getir
        $guncellemeler = GuncellemeModel::orderBy('id', 'DESC')->where('silindi', 0)->get(['android', 'aciklama','android_check', 'playstore_link']);
        return response()->json($guncellemeler);
    }

    public function index()
    {
        $guncellemeler = GuncellemeModel::orderBy('id', 'DESC')->where('silindi', 0)->get();
        return view('pages.guncelleme.guncelleme', compact('guncellemeler'));
    }

    public function store(Request $request)
    {
        $guncelleme = new GuncellemeModel();
        $guncelleme->android = $request->android;
        $guncelleme->ios = $request->ios;
        $guncelleme->aciklama = $request->aciklama;
        $guncelleme->android_check = 1;
        $guncelleme->ios_check = 1;
        $guncelleme->playstore_link = $request->playstore_link;
        $guncelleme->appstore_link = $request->appstore_link;
        $guncelleme->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }

    public function destroy($id)
    {
//silindi 1 yapılıyor
        $guncelleme = GuncellemeModel::find($id);
        $guncelleme->silindi = 1;
        $guncelleme->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

}
