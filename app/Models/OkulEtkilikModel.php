<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OkulEtkilikModel extends Model
{
    use HasFactory;

    protected $table = 'okuletkinlik';

    protected $fillable = [
        'adi',
        'baslangic_tarihi',
    ];

    protected $hidden = [
        'silindi'
    ];
}
