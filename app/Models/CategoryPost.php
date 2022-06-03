<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPost extends Pivot {

    public $timestamps = false;

    protected $table = 'category_post';

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
