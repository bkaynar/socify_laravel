<?php

namespace App\Http\Controllers;

use App\Models\SikayetModel;
use Illuminate\Http\Request;

class SikayetController extends Controller
{
   // Create a new sikayet
   //API URL: http://localhost:8000/api/sikayet
    //Method: POST
    //Fields: isimSoyisim, sikayetSahibiTel, sikayetSahibiMail, sikayetMetni, androidVersion, androidBrand, androidDevice, androidFingerprint, androidID, androidManufacturer, androidModel, androidSerialNumber, ipAdresi
    public function createSikayet(Request $request)
    {
        $sikayet = new SikayetModel();
        $sikayet->isimSoyisim = $request->isimSoyisim;
        $sikayet->sikayetSahibiTel = $request->sikayetSahibiTel;
        $sikayet->sikayetSahibiMail = $request->sikayetSahibiMail;
        $sikayet->sikayetMetni = $request->sikayetMetni;
        $sikayet->androidVersion = $request->androidVersion;
        $sikayet->androidBrand = $request->androidBrand;
        $sikayet->androidDevice = $request->androidDevice;
        $sikayet->androidFingerprint = $request->androidFingerprint;
        $sikayet->androidID = $request->androidID;
        $sikayet->androidManufacturer = $request->androidManufacturer;
        $sikayet->androidModel = $request->androidModel;
        $sikayet->androidSerialNumber = $request->androidSerialNumber;
        $sikayet->ipAdresi = $request->ipAdresi;
        $sikayet->save();
        return response()->json([
            'message' => 'Sikayet created successfully'
        ], 201);
    }
    public function listele()
    {
        $sikayet = SikayetModel::all();
        return response()->json($sikayet);
    }
}
