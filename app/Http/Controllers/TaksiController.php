<?php

namespace App\Http\Controllers;

use App\Models\TaksiModel;
use Illuminate\Http\Request;

class TaksiController extends Controller
{
    public function index()
    {
        $taksiler=TaksiModel::orderBy('oncelik','DESC')->orderBy('id','ASC')->where('silindi',0)->get();
        return view('pages.taksi.taksi',compact('taksiler'));
    }
    public function store(Request $request)
    {
        $taksi = new TaksiModel();
        $taksi->adi = $request->adi;
        $taksi->plaka = $request->plaka;
        $taksi->telefon = $request->telefon;
        $taksi->aktif = 1;
        $taksi->silindi = 0;
        $taksi->oncelik = 0;
        $taksi->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }
    public function aktiflik($id)
    {
        $taksi = TaksiModel::find($id);
        if($taksi->aktif==1){
            $taksi->aktif=0;
        }else{
            $taksi->aktif=1;
        }

        $taksi->save();
        return response()->json(['success' => 'Başarıyla Güncellendi', 'aktif' => $taksi->aktif]);
    }
    public function oncelikver($id)
    {
        $taksi = TaksiModel::find($id);
        if($taksi->oncelik==1){
            $taksi->oncelik=0;
        }else{
            $taksi->oncelik=1;
        }
        $taksi->save();
        return response()->json(['success' => 'Başarıyla Güncellendi', 'oncelik' => $taksi->oncelik]);
    }
    public function destroy($id)
    {
        $taksi = TaksiModel::find($id);
        $taksi->silindi = 1;
        $taksi->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

    public function goster(){
        // aktif=1 silindi=0 olanları getir , oncelik 1 olanlar olanlar ustte 0 olanlar oncelik 1 olanların altında yer alacak sadece adi,plaka,telefon kolonlarını getir
        $taksiler = TaksiModel::orderBy('oncelik','DESC')->orderBy('id','ASC')->where('aktif',1)->where('silindi',0)->get(['adi','plaka','telefon']);
        //$taksiler = TaksiModel::orderBy('id','DESC')->where('aktif',1)->where('silindi',0)->get(['adi','plaka','telefon']);
        //JSON formatında döndür
        return response()->json($taksiler);
    }
}
