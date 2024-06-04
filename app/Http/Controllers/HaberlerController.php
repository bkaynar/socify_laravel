<?php

namespace App\Http\Controllers;

use App\Models\HaberlerModel;
use Illuminate\Http\Request;

class HaberlerController extends Controller
{
    public function index()
    {
        //son girilen haber en başta olacak silindi 0 olanlar ve maksimum 7 tane
        $haberler = HaberlerModel::orderBy('tarih', 'desc')->where('silindi', 0)->take(12)->get();
        return response()->json($haberler);
    }

    public function listele()
    {
        $haberler=HaberlerModel::orderBy('tarih', 'desc')->where('silindi', 0)->get();
        return view('pages.haber.haberler', compact('haberler'));
    }
    public function destroy($id)
    {
        $haber = HaberlerModel::find($id);
        $haber->silindi = 1;
        $haber->save();
        return response()->json([
            'success' => 'Başarıyla Silindi',
            'message' => 'Haber başarıyla silindi',
            'code' => '200'
        ]);
    }
}
