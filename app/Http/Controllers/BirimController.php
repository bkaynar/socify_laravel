<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\OtobusSaatleri;
use Illuminate\Http\Request;

class BirimController extends Controller
{
    public function index()
    {
        $birimler = Birim::orderBy('ad', 'ASC')->where('silindi', 0)->get();
        return view('pages.birim.birimler', compact('birimler'));
    }

    public function store(Request $request)
    {
        $birimler = new Birim();
        $birimler->ad = $request->ad;
        $birimler->link= $request->link;
        $birimler->silindi = 0;
        $birimler->save();
    }

    //
    public function destroy($id)
    {
        //put ile veriyi alıyoruz
        $birimler = Birim::find($id);
        $birimler->silindi = 1;
        $birimler->save();
        //response ile veri döndereceğiz çünkü ajax ile çalışıyoruz sweatalert ile mesaj göstermek için
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

    //listele
    public function listele()
    {
        //verilerin order by ile sıralanmasını ve 'silindi' bölümünün 0 olmasını istiyoruz
        $birimler = Birim::orderBy('id', 'DESC')->where('silindi', 0)->select('id', 'ad','link')->get();
        //api.php deki route ile çalışıyoruz
        return response()->json($birimler);
    }
}
