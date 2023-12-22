<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class ServiceWork extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['service_id', 'attachment'];
    public $translatedAttributes = ['name'];

    public function image(){
        return $this->hasOne(Image::class, 'imageable_id', 'id')->where('image_model', 'ServiceWork');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}