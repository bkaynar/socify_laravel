<?php

namespace App\Http\Controllers;

use App\Models\Eczane;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EczaneController extends Controller
{
    //index
    public function index()
    {
        //date bugün olan verileri  ve silindi_mi 0 olanları göster
        $eczaneler = Eczane::where('date', Carbon::today())->where('silindi_mi', 0)->get();
        return view('pages.eczane.eczane', compact('eczaneler'));
    }

    //create
    public function create()
    {
        return view('pages.eczane.eczaneekle');
    }

    //store
    public function store(Request $request)
    {
        // Eczane modeli oluşturma ve veritabanına kaydetme işlemi
        $eczane = new Eczane();
        $eczane->name = $request->name;
        $eczane->address = $request->address;
        $eczane->phone = $request->phone;
        $eczane->date = $request->date;
        $eczane->silindi_mi = 0;
        $eczane->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }

    //destroy
    public function destroy($id)
    {
        //put ile veriyi alıyoruz
        $eczaneler = Eczane::find($id);
        $eczaneler->silindi_mi = 1;
        $eczaneler->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

    //listele
    public function listele()
    {
//nöbetçi eczane mantığı bugünün nöbetçi eczanesi yarın sabah 8'e kadar açık olacak o yüzden kullanıcı saat 00.00' ı geçse bile önceki günün nöbetçi eczanesini görebilir
        $eczaneler = Eczane::where('date', Carbon::now())->where('silindi_mi', 0)->get();
        return response()->json($eczaneler);
    }
}
