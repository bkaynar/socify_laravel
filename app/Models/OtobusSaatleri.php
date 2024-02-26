<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtobusSaatleri extends Model
{
    use HasFactory;
    protected $table = 'otobussaatleri';
    protected $fillable = ['saat', 'silindi'];
}
