<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Counter extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['value'];
    public $translatedAttributes = ['title'];

    public function image(){
        return $this->hasOne(Image::class, 'imageable_id', 'id')->where('image_model', 'Counter');
    }
}