<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Hero extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $table = 'heros';
    protected $fillable = ['image'];
    public $translatedAttributes = ['title', 'subtitle'];

    public function image(){
        return $this->hasOne(Image::class, 'imageable_id', 'id')->where('image_model', 'Hero');
    }
}