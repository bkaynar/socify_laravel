<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\BirimController;
use App\Http\Controllers\DuyuruController;
use App\Http\Controllers\EkipController;
use App\Http\Controllers\EtkinlikController;
use App\Http\Controllers\GuncellemeController;
use App\Http\Controllers\KaliteBildirimController;
use App\Http\Controllers\KaliteGondericiController;
use App\Http\Controllers\OtobusSaatleriController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TaksiController;
use App\Http\Controllers\ToplulukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YemekController;
use App\Http\Controllers\YurtYemekController;
use App\Http\Controllers\ZiyaretciController;
use Illuminate\Support\Facades\Auth;

//users tablosuna kayıt ekleme
//Route::get('/add-user', function () {
//
//    $name = 'burak';
//    $email = 'burak@shiningmoony.com.tr';
//    $password = bcrypt('123456');
//    $silindi_mi = false;
//
//    // Veritabanına kullanıcıyı ekle
//    DB::table('users')->insert([
//        'name' => $name,
//        'email' => $email,
//        'password' => $password,
//        'silindi' => $silindi_mi
//    ]);
//    return view('dashboard');
//});


//php artisan migrate:reset
Route::get('/run-migration-reset', function () {
    Artisan::call('migrate:reset');
    return view('dashboard');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return view('dashboard');
});
//php artisan config:cache
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return view('dashboard');
});
//php artisan config:clear
Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    return view('dashboard');
});
Route::get('/run-migration', function () {
    Artisan::call('migrate');
    return redirect()->route('login');
});



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {


    Route::get('/home', function () {
        return view('dashboard');
    });
    Route::group(['prefix' => 'charts'], function(){
        Route::get('apex', function () { return view('pages.charts.apex'); });
        Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
        Route::get('flot', function () { return view('pages.charts.flot'); });
        Route::get('peity', function () { return view('pages.charts.peity'); });
        Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
    });



    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/logout', function () {
        auth('web')->logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('kullanicilar', [UserController::class, 'index'])->name('kullanicilar');
    Route::get('kullaniciekle',
        function () {
            return view('pages.kullanici.kullaniciekle');
        });

    Route::get('ekip', [EkipController::class, 'index'])->name('ekip');
    Route::get('ekipekle',
        function () {
            return view('pages.ekip.ekipekle');
        });

    Route::get('otobus-saatleri', [OtobusSaatleriController::class, 'index'])->name('otobus-saatleri');
    Route::get('otobus-saati-ekle',
        function () {
            return view('pages.otobus-saatleri.otobus-saati-ekle');
        });

    Route::get('yemekler', [YemekController::class, 'index'])->name('yemekler');
    Route::get('yemekekle',
        function () {
            return view('pages.yemek.yemekekle');
        });

//Birimler
    Route::get('birimler', [BirimController::class, 'index'])->name('birimler');
    Route::get('birimekle',
        function () {
            return view('pages.birim.birimekle');
        });

//Duyurular
    Route::get('duyurular', [DuyuruController::class, 'index'])->name('duyurular');
    Route::get('duyuruekle', [DuyuruController::class, 'birimler'])->name('duyuruekle');

//Topluluklar
    Route::get('topluluklar', [ToplulukController::class, 'index'])->name('topluluklar');
    Route::get('toplulukekle', function () {
        return view('pages.topluluk.toplulukekle');
    });
//Etkinlikler
    Route::get('etkinlikler', [EtkinlikController::class, 'index'])->name('etkinlikler');
    Route::get('etkinlikekle', [EtkinlikController::class, 'topluluklar'])->name('etkinlikekle');

//KaliteBildirim
    Route::get('kalitebildirim', [KaliteBildirimController::class, 'index'])->name('kalitebildirim');
    Route::get('kalitebildirimekle', function () {
        return view('pages.kalite.kalitebildirimekle');
    });

//KaliteGonderici
    Route::get('kalitegonderici', [KaliteGondericiController::class, 'index'])->name('kalitegonderici');
    Route::get('kalitegondericiekle', function () {
        return view('pages.kalite.kalitegondericiekle');
    });

//Guncelleme
    Route::get('guncelleme', [GuncellemeController::class, 'index'])->name('guncelleme');
    Route::get('guncelleme-ekle', function () {
        return view('pages.guncelleme.guncelleme-ekle');
    });

//Taksi
    Route::get('taksi', [TaksiController::class, 'index'])->name('taksi');
    Route::get('taksi-ekle', function () {
        return view('pages.taksi.taksi-ekle');
    });
//Story
    Route::get('story', [StoryController::class, 'index'])->name('story');
    Route::get('story-ekle', function () {
        return view('pages.story.story-ekle');
    });
    // Yurt Yemekleri
    Route::get('yurt-yemek', [YurtYemekController::class, 'index'])->name('yurt-yemek');
    Route::get('yurt-yemek-ekle', function () {
        return view('pages.yurtyemek.yurtyemekekle');
    });
    Route::get('ziyaretciler', [ZiyaretciController::class, 'getir'])->name('ziyaretciler');




//Ekleme İşlemleri
    Route::post('otobus-saat-ekle', [OtobusSaatleriController::class, 'store'])->name('otobus-saat-ekle');
    Route::post('yemek-ekle', [YemekController::class, 'store'])->name('yemek-ekle');
    Route::post('birim-ekle', [BirimController::class, 'store'])->name('birim-ekle');
    Route::post('duyuru-ekle', [DuyuruController::class, 'store'])->name('duyuru-ekle');
    Route::post('topluluk-ekle', [ToplulukController::class, 'store'])->name('topluluk-ekle');
    Route::post('etkinlik-ekle', [EtkinlikController::class, 'store'])->name('etkinlik-ekle');
    Route::post('kalitebildirim-ekle', [KaliteBildirimController::class, 'store'])->name('kalitebildirim-ekle');
    Route::post('kalitegonderici-ekle', [KaliteGondericiController::class, 'store'])->name('kalitegonderici-ekle');
    Route::post('kullanici-ekle', [UserController::class, 'store'])->name('kullanici-ekle');
    Route::post('ekip-ekle', [EkipController::class, 'store'])->name('ekip-ekle');
    Route::post('guncelleme-ekle', [GuncellemeController::class, 'store'])->name('guncelleme-ekle');
    Route::post('taksi-ekle', [TaksiController::class, 'store'])->name('taksi-ekle');
    Route::post('story-ekle', [StoryController::class, 'store'])->name('story-ekle');
    Route::post('yurt-yemek-ekle', [YurtYemekController::class, 'store'])->name('yurt-yemek-ekle');


//Silme İşlemleri
    Route::put('otobus-saati-delete/{id}', [OtobusSaatleriController::class, 'destroy'])->name('otobus-saati-delete');
    Route::put('yemek-delete/{id}', [YemekController::class, 'destroy'])->name('yemek-delete');
    Route::put('birim-delete/{id}', [BirimController::class, 'destroy'])->name('birim-delete');
    Route::put('duyuru-delete/{id}', [DuyuruController::class, 'destroy'])->name('duyuru-delete');
    Route::put('topluluk-delete/{id}', [ToplulukController::class, 'destroy'])->name('topluluk-delete');
    Route::put('etkinlik-delete/{id}', [ToplulukController::class, 'destroy'])->name('etkinlik-delete');
    Route::put('kalitebildirim-delete/{id}', [KaliteBildirimController::class, 'destroy'])->name('kalitebildirim-delete');
    Route::put('kullanici-delete/{id}', [UserController::class, 'destroy'])->name('kullanici-delete');
    Route::put('ekip-delete/{id}', [EkipController::class, 'destroy'])->name('ekip-delete');
    Route::put('guncelleme-delete/{id}', [GuncellemeController::class, 'destroy'])->name('guncelleme-delete');
    Route::put('taksi-delete/{id}', [TaksiController::class, 'destroy'])->name('taksi-delete');
    Route::put('story-delete/{id}', [StoryController::class, 'destroy'])->name('story-delete');
    Route::put('yurt-yemek-delete/{id}', [YurtYemekController::class, 'destroy'])->name('yurt-yemek-delete');


//Düzenleme İşlemleri
    Route::put('taksi-aktif/{id}', [TaksiController::class, 'aktiflik'])->name('taksi-aktif');
    Route::put('taksi-oncelik/{id}', [TaksiController::class, 'oncelikver'])->name('taksi-oncelik');
    Route::put('story-aktif/{id}', [StoryController::class, 'aktiflik'])->name('story-aktif');
    Route::put('story-oncelik/{id}', [StoryController::class, 'oncelikver'])->name('story-oncelik');

    Route::group(['prefix' => 'error'], function () {
        Route::get('404', function () {
            return view('pages.error.404');
        });
        Route::get('500', function () {
            return view('pages.error.500');
        });
    });

//Run Migration


// 404 for undefined routes
    Route::any('/{page?}', function () {
        return View::make('pages.error.404');
    })->where('page', '.*');

}
);


