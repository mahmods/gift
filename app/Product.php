<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $fillable = ['price', 'category', 'quantity', 'images', 'download', 'options'];
    public $translatedAttributes = ['title','text'];
    public $timestamps = false;
}