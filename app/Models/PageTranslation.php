<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'description', 'meta_title', 'meta_keywords', 'meta_description'];
    public $timestamps = false;
}