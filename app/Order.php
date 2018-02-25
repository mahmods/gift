<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }
}
