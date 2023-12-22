<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Page extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['slug'];
    public $translatedAttributes = ['title', 'description', 'meta_title', 'meta_keywords', 'meta_description'];

    public function paragraphs(){
        return $this->hasMany(Paragraph::class, 'paragraphable_id', 'id')->where('paragraph_model', 'Page');
    }
}