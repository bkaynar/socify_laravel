<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etkinlik extends Model
{
    use HasFactory;

    protected $table = 'etkinlikler';
    protected $fillable = ['adi', 'icerik', 'fotograf', 'topluluk_id', 'silindi_mi'];

    public function topluluk()
    {
        return $this->belongsTo(Topluluk::class,'topluluk_id','id');//bir etkinlik bir topluluğa ait olabilir
    }
}
