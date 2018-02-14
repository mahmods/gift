<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'sid',
    ];

    public function addresses() {
        return $this->hasMany('App\Address');
    }

    public function mainAddress() {
        return $this->hasOne('App\Address');
    }
}
