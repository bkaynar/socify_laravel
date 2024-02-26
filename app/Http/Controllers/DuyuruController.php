<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\Duyuru;
use Illuminate\Http\Request;

class DuyuruController extends Controller
{
    public function index()
    {
        $duyurular = Duyuru::orderBy('baslik', 'ASC')->where('silindi', 0)->get();
        return view('pages.duyuru.duyurular', compact('duyurular'));
    }

    //Duyurulara eklenecek olan birimleri çekiyoruz
    public function birimler()
    {
        $birimler = Birim::orderBy('ad', 'ASC')->where('silindi', 0)->get();
        return view('pages.duyuru.duyuruekle', compact('birimler'));
    }

    //store fonksiyonu ile veri kaydediyoruz
    public function store(Request $request)
    {

        // Dosyayı kaydetme işlemi
       /* $imageName = time().'.'.$request->fotograf->extension();
        $request->fotograf->move(public_path('images/duyuru'), $imageName);
*/
        // Duyuru modeli oluşturma ve veritabanına kaydetme işlemi
        $duyuru = new Duyuru();
        $duyuru->baslik = $request->baslik;
        $duyuru->icerik = $request->icerik;
        $duyuru->link = $request->link;
        $duyuru->birim_id = $request->birim_id;
        $duyuru->silindi = 0;
        $duyuru->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }

    //destroy fonksiyonu ile veri siliyoruz
    public function destroy($id)
    {
        //put ile veriyi alıyoruz
        $duyurular = Duyuru::find($id);

        $duyurular->silindi = 1;
        $duyurular->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }
    public function duyurular($id)
    {
        $duyurular= Duyuru::orderBy('id', 'DESC')->where('silindi', 0)->where('birim_id', $id)->select('baslik','link','birim_id')->get();
        //$duyurular = Duyuru::orderBy('id', 'DESC')->where('silindi', 0)->where('birim_id', $id)->get();
        return response()->json($duyurular);
    }
}
