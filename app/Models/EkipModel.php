<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkipModel extends Model
{
    use HasFactory;

    protected $table = 'ekip';
    protected $fillable = [
        'adsoyad',
        'unvan',
        'aciklama',
        'resim',
        'silindi'
    ];
}
