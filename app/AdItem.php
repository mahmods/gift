<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdItem extends Model
{
    public $fillable = [
        'url', 'image'
    ];
    public $timestamps = false;

}
