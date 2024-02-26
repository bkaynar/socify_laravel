<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalite extends Model
{
    use HasFactory;

    protected $table = 'kalite';

    protected $fillable = [
        'kalitegonderici_id',
        'kalitebildirim_id',
        'birim_id',
        'konu',
        'icerik',
        'adsoyad',
        'eposta',
        'telefon',
        'dosya',
        'silindi',
        'created_at',
        'updated_at',
    ];
}
