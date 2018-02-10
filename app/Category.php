<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $fillable = ['path', 'parent'];
    public $timestamps = false;
    public $translatedAttributes = ['name'];
}
