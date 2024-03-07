<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaksiModel extends Model
{
    use HasFactory;

    protected $table = 'taksi';
    protected $primaryKey = 'id';
protected $fillable = [
        'adi',
        'plaka',
        'telefon',
        'aktif',
        'silindi',
        'oncelik'
    ];
}
