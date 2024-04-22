<?php

namespace App\Http\Controllers;

use App\Models\FirsatlarModel;
use Illuminate\Http\Request;

class FirsatlarController extends Controller
{
    public function index()
    {
        $firsatlar = FirsatlarModel::orderBy('oncelik', 'DESC')->where('silindi',0)->orderBy('id', 'ASC')->get();
        return view('pages.firsat.firsatlar', compact('firsatlar'));
    }

    public function store(Request $request)
    {
        $firsat = new FirsatlarModel();
        $firsat->adi = $request->adi;
        $firsat->aciklama = $request->aciklama;
        //fotoğraf yükleme işlemi
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/firsat'), $filename);
            $firsat->foto = 'uploads/firsat/' . $filename;
        }

        $firsat->link = $request->link;
        $firsat->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }

    public function oncelikVer($id)
    {
        $firsat = FirsatlarModel::find($id);
        if ($firsat->oncelik == 1) {
            $firsat->oncelik = 0;
        } else if($firsat->oncelik == 0){
            $firsat->oncelik = 1;
        }

        $firsat->save();
        return response()->json(['success' => 'Başarıyla Güncellendi', 'oncelik' => $firsat->oncelik]);
        //burası çok önemli
        //bakın burası çokomelli
        //gayet önemli
    }
    public function destroy($id)
    {
        $firsat = FirsatlarModel::find($id);
        $firsat->silindi = 1;
        $firsat->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }
    public function listele()
    {
        $firsatlar = FirsatlarModel::orderBy('oncelik','ASC')->where('silindi', 0)->get();
        return response()->json($firsatlar);
    }
}
