<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yemek extends Model
{
    use HasFactory;
    protected $table = 'yemekler';

    protected $fillable = [ 'yemek1', 'yemek2', 'yemek3', 'yemek4', 'tarih', 'silindi' ];
}
