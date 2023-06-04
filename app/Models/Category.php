<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $primarykey ="id";
    protected $foreignkey ="user_id";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_active'
    ];

    public function user(){
        try {
            $data =  $this->belongsTo(User::class, 'user_id', 'id');
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
