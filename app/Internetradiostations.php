<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internetradiostations extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'logo',
    ];
}
