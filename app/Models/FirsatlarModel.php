<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirsatlarModel extends Model
{
    use HasFactory;

    protected $table = 'firsatlar';

    protected $fillable = [
        'adi',
        'aciklama',
        'foto',
        'oncelik',
        'link',
    ];


    public function getFirsatlar()
    {        //silindi sütunu 0 olanları getir
        return $this->where('silindi', 0)->get();
    }
}
