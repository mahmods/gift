<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public $timestamps = false;

    public function items() {
        return $this->hasMany("\App\AdItem", "ad_id");
    }
}
