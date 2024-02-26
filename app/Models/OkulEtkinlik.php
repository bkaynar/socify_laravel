<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OkulEtkinlik extends Model
{
    use HasFactory;

    protected $table = 'okuletkinlik';
    protected $fillable = [
        'id',
        'baslik',
        'baslangic',
        'saati',
        'link',
        'resim',
    ];

}
