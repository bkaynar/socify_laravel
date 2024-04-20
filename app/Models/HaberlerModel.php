<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HaberlerModel extends Model
{
    use HasFactory;

    protected $table = 'haberler';

    protected $fillable = [
        'baslik',
        'resim_yolu',
        'aciklama',
        'link',
        'tarih'
    ];

    protected $hidden = [
        'silindi',
        'created_at',
        'updated_at'
    ];
}
