<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlocMeta extends Model
{
    public $timestamps = false;
    public $table = "blocsmeta";
    public $fillable = [
        'meta_key', 'meta_value'
    ];
}
