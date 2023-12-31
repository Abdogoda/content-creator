<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle'];
    public $timestamps = false;
}