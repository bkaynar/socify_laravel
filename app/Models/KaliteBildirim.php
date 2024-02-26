<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaliteBildirim extends Model
{
    use HasFactory;

    protected $table = 'kalitebildirim';
    protected $fillable = [
        'kalitebildirim_adi',
        'silindi',
        'created_at',
        'updated_at',
    ];
}
