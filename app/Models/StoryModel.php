<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryModel extends Model
{
    use HasFactory;

    protected $table = 'story';
    protected $fillable = ['title','ana_foto','fotograf','oncelik','aktif','silindi'];
}
