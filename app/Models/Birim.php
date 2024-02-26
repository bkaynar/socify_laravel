<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birim extends Model
{
    use HasFactory;

    protected $table = 'birim';

    protected $fillable = [
        'ad',
        'kullanici_adi',
        'sifre',
        'silindi',
    ];

}
