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
}
