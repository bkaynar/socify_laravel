<?php

namespace App\Http\Controllers;

use App\Models\Topluluk;
use Illuminate\Http\Request;

class ToplulukController extends Controller
{
    //index
    public function index()
    {
        $topluluklar = Topluluk::orderBy('adi', 'ASC')->where('silindi_mi', 0)->get();
        return view('pages.topluluk.topluluklar', compact('topluluklar'));
    }

    //store
    public function store(Request $request)
    {


        $topluluklar = new Topluluk();
        $topluluklar->adi = $request->adi;
        $topluluklar->silindi_mi = 0;
        $topluluklar->save();
    }

    //destroy
    public function destroy($id)
    {
        $topluluklar = Topluluk::find($id);
        $topluluklar->silindi_mi = 1;
        $topluluklar->save();

        return response()->json(['success' => 'Başarıyla Silindi']);
    }
    //listele
    public function listele()
    {
        $topluluklar = Topluluk::orderBy('adi', 'ASC')->where('silindi_mi', 0)->get();
        return response()->json($topluluklar);
    }
}
