<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];


    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_post')
            ->using(CategoryPost::class);
    }

}
