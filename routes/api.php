<?php

use App\Http\Controllers\ZiyaretciController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//

//YemekControllerdaki listele fonksiyonu ile çalışıyoruz
Route::get('/yemek-listele', 'YemekController@listele');

//YemekControllerdaki bugununyemeği fonksiyonu ile çalışıyoruz
Route::get('/bugunun-yemegi', 'YemekController@bugununyemegi');

//DuyuruControllerdaki duyurular fonksiyonu ile çalışıyoruz
Route::get('/duyurular/{id}', 'DuyuruController@duyurular');

//EtkinlikControllerdaki etkinlikler fonksiyonu ile çalışıyoruz
Route::get('/etkinlikler', 'EtkinlikController@tumetkinlikler');

//BirimControllerdaki listele fonksiyonu ile çalışıyoruz
Route::get('/birim-listele', 'BirimController@listele');

//ToplulukControllerdaki listele fonksiyonu ile çalışıyoruz
Route::get('/topluluk-listele', 'ToplulukController@listele');

//OtobusSaatleriControllerdaki listele fonksiyonu ile çalışıyoruz
Route::get('/otobus-saatleri-listele', 'OtobusSaatleriController@listele');

//OtobusSaatleriControllerdaki otobusSaatleri fonksiyonu ile çalışıyoruz
Route::get('/en-yakin-otobus', 'OtobusSaatleriController@enyakinOtobus');

Route::get('/eczane-listele', 'EczaneController@listele');

Route::get('/okul-etkinlik', 'OkulEtkinlikController@okuletkinlik')->middleware('CheckSecretKey');

Route::get('/ekip-goruntule','EkipController@listele')->middleware('CheckSecretKey');

Route::get('/guncelleme', 'GuncellemeController@guncelleme')->middleware('CheckSecretKey');

Route::get('/taksi-listele', 'TaksiController@goster')->middleware('CheckSecretKey');

Route::get('/story-listele', 'StoryController@listele')->middleware('CheckSecretKey');

Route::get('/yurt-sabah-yemek', 'YurtYemekController@sabahlistele')->middleware('CheckSecretKey');

Route::get('yurt-bugun-sabah-yemek','YurtYemekController@bugunkahvalti')->middleware('CheckSecretKey');

Route::get('/yurt-bugun-aksam-yemek', 'YurtYemekController@bugunaksam')->middleware('CheckSecretKey');

Route::get('/yurt-aksam-yemek', 'YurtYemekController@aksamlistele')->middleware('CheckSecretKey');

Route::get('/gunluk-ziyaretci-sayisi', 'ZiyaretciController@index')->middleware('CheckSecretKey');

Route::post('/sikayet-gonder', 'SikayetController@createSikayet')->middleware('CheckSecretKey');

Route::get('/sikayet-listele', 'SikayetController@listele')->middleware('CheckSecretKey');

Route::get('okul-etkinlik', 'OkulEtkinlikController@goruntule')->middleware('CheckSecretKey');

Route::get('/haberler', 'HaberlerController@index')->middleware('CheckSecretKey');
