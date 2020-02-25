<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $table = 'movies';
    protected $fillable = ['mov_title', 'mov_year', 'mov_rate', 'mov_time', 'mov_genre','mov_direct', 'mov_story', 'mov_img'];
}
