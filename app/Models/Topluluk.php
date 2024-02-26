<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topluluk extends Model
{
    use HasFactory;

    protected $table = 'topluluk';
    protected $fillable = [
        'ad',
        'aciklama',
        'fotograf',
        'kullanici_adi',
        'sifre',
        'silindi_mi'
    ];
}
