<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $fillable = ['paragraphable_id', 'text', 'paragraph_model'];
    public $translatedAttributes = ['text'];
    
}