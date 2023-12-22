<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    
    protected $fillable = ['slug', 'icon'];
    public $translatedAttributes = ['name', 'meta_title', 'meta_description', 'meta_keywords', 'description'];

    public function paragraphs(){
        return $this->hasMany(Paragraph::class, 'paragraphable_id', 'id')->where('paragraph_model', 'Service');
    }
    public function image(){
        return $this->hasOne(Image::class, 'imageable_id', 'id')->where('image_model', 'Service');
    }

    public function works(){
        return $this->hasMany(ServiceWork::class, 'service_id', 'id');
    }
}