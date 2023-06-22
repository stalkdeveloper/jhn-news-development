<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "news";
    protected $primarykey ="id";
    protected $foreignkey =['user_id', 'category_id'];

    protected $fillable = [
        'user_id',
        'category_id',
        'type',
        'title',
        'description',
        'image',
        'video',
        'is_active'
    ];
}
