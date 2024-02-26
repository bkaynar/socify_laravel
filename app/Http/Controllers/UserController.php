<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //Kullanici listeleme
    public function index()
    {
        $kullanicilar = User::orderBy('id', 'ASC')->where('silindi', 0)->get();
        return view('pages.kullanici.kullanicilar', compact('kullanicilar'));
    }
    //Kullanici ekleme
    public function store(Request $request)
    {
        $kullanicilar = new User();
        $kullanicilar->name = $request->name;
        $kullanicilar->email = $request->email;
        //sifreyi hashleyerek kaydediyoruz
        $kullanicilar->password = bcrypt($request->password);
        $kullanicilar->silindi = 0;
        $kullanicilar->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }
    //Kullanici şifre değiştirme
    public function update(Request $request)
    {
        $kullanicilar = User::find($request->id);
        $kullanicilar->sifre = bcrypt($request->sifre);
        $kullanicilar->save();
    }
    //Kullanici silme
    public function destroy(Request $request)
    {
        $kullanicilar = User::find($request->id);
        $kullanicilar->silindi = 1;
        $kullanicilar->save();
    }


}
