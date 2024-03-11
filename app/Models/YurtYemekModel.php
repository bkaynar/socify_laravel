<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YurtYemekModel extends Model
{
    use HasFactory;

    protected $table = 'yurt_yemek';
    protected $fillable = ['corba', 'ikinci', 'ikincialternatif', 'ucuncu', 'dorduncu', 'digeryiyecekler', 'tarih', 'sabah_aksam', 'silindi_mi'];
}
