<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuncellemeModel extends Model
{
    use HasFactory;

    protected $table = 'guncelleme';
    protected $fillable = [
        'android',
        'ios',
        'android_check',
        'ios_check',
        'playstore_link',
        'appstore_link'
    ];
    protected $hidden = [
        'silindi',
        'created_at',
        'updated_at'

    ];
}
