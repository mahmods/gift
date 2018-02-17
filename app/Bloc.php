<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    public $timestamps = false;

    public function meta() {
        return $this->hasMany("\App\BlocMeta");
    }
}
