<?php

namespace App\Http\Controllers;

use App\Models\OtobusSaatleri;
use http\Env\Response;
use Illuminate\Http\Request;

class OtobusSaatleriController extends Controller
{
    //index
    public function index()
    {
        //verilerin order by ile sıralanmasını ve 'silindi' bölümünün 0 olmasını istiyoruz
        $otobusSaatleri = OtobusSaatleri::orderBy('id', 'ASC')->where('silindi', 0)->get();
        //OtobusSaatleriController dan gelen veriyi otobus-saati.blade.php ye gönderiyoruz ve URL olarak otobus-saatleri kullanıyoruz
        return view('pages.otobus-saatleri.otobus-saati', compact('otobusSaatleri'));
    }

    //store
    public function store(Request $request)
    {
        //veriler formdata ile gelir
        $otobusSaatleri = new OtobusSaatleri();

        $otobusSaatleri->saat = $request->saat;
        //silindi mi
        $otobusSaatleri->silindi = 0;
        $otobusSaatleri->save();
    }
    //DELETE
    public function destroy($id)
    {
//put ile veriyi alıyoruz
        $otobusSaatleri = OtobusSaatleri::find($id);
        $otobusSaatleri->silindi = 1;
        $otobusSaatleri->save();
        //response ile veri döndereceğiz çünkü ajax ile çalışıyoruz sweatalert ile mesaj göstermek için
        return response()->json(['success' => 'Başarıyla Silindi']);
    }
    public function listele(){
        //verilerin order by ile sıralanmasını ve 'silindi' bölümünün 0 olmasını istiyoruz ve saati hh:mm:ss formatında olan saatleri hh:mm formatına çeviriyoruz
    $otobusSaatleri = OtobusSaatleri::orderBy('saat', 'ASC')->where('silindi', 0)->get();
    foreach ($otobusSaatleri as $otobusSaat){
        $otobusSaat->saat = substr($otobusSaat->saat, 0, 5);
    }
    //api.php deki route ile çalışıyoruz

    return response()->json($otobusSaatleri);
    }
    //şuan saat 18.00 ise 18.00 den sonraki en yakın otobüs saatini çekiyoruz
    public function enyakinOtobus(){
        //bugünün yemeğini çekiyoruz
        $otobusSaatleri = OtobusSaatleri::orderBy('id', 'ASC')->where('silindi', 0)->where('saat', '>=', date('H:i:s'))->first();
        //api.php deki route ile çalışıyoruz
        return response()->json($otobusSaatleri);
    }
}
