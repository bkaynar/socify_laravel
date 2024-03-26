<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZiyaretciModel extends Model
{
    use HasFactory;

    protected $table = 'ziyaretci';

    protected $primaryKey = 'id';
    protected $fillable = [
        'visitor_count','updated_at'
    ];
    protected $hidden = [
        'created_at'
    ];

}
