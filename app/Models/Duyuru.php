<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Birim;

class Duyuru extends Model
{
    use HasFactory;

    protected $table = 'duyuru';
    protected $fillable = ['baslik', 'icerik', 'fotograf', 'birim_id', 'silindi'];

    public function birim()
    {
        return $this->belongsTo(Birim::class,'birim_id','id');//bir duyuru bir birime ait olabilir
    }

}
