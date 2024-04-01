<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SikayetModel extends Model
{
    use HasFactory;

    protected $table = 'sikayetler';
    protected $fillable = [
        'isimSoyisim',
        'sikayetSahibiTel',
        'sikayetSahibiMail',
        'sikayetMetni',
        'androidVersion',
        'androidBrand',
        'androidDevice',
        'androidFingerprint',
        'androidID',
        'androidManufacturer',
        'androidModel',
        'androidSerialNumber',
        'ipAdresi',
        'cevap',
        'cevapmetni',
        'cevaplanmatarihi'
    ];
    protected $hidden = [
        'silindi',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'cevaplanmatarihi' => 'datetime',
    ];


}
