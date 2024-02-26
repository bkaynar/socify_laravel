<?php

namespace App\Http\Controllers;

use App\Models\EkipModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EkipController extends Controller
{
    public function index()
    {
        $ekipler = EkipModel::orderBy('id', 'ASC')->where('silindi', 0)->get();
        return view('pages.ekip.ekip', compact('ekipler'));
    }

    public function store(Request $request)
    {
        $ekip = new EkipModel();
        $ekip->adsoyad = $request->adsoyad;
        $ekip->unvan = $request->unvan;
        $ekip->aciklama = $request->aciklama;

        if($request->hasFile('resim')) {
            $image = $request->file('resim');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //400x400 boyutunda kaydet
            $path = public_path('images/ekip/' . $filename);
            Image::make($image->getRealPath())->resize(400, 400)->save($path);
        }
        $ekip->resim = 'images/ekip/' . $filename;
        $ekip->save();
        return response()->json(['message' => 'Ekip eklendi.']);


    }
    public function listele()
    {
        //silindi 0 olanları getir ve sadece adsoyad,unvan,aciklama,resim verilerini getir
        $ekipler = EkipModel::where('silindi', 0)->get(['adsoyad', 'unvan', 'aciklama', 'resim']);
        return response()->json($ekipler);
    }
    public function destroy($id)
    {
        $ekip = EkipModel::find($id);
        $ekip->silindi = 1;
        $ekip->save();
        return response()->json(['message' => 'Ekip silindi.']);
    }

}
