<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaliteGonderici extends Model
{
    use HasFactory;

    protected $table = 'kalitegonderici';
    protected $fillable = [
        'kalitegonderici_adi',
        'silindi',
        'created_at',
        'updated_at',
    ];
}
