<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {

        return view('post-list', ['posts' => Post::with('categories', 'author')->paginate(10)]);
    }

    public function show(Post $post) {
        $post->load('categories', 'author');

        return view('post-details', compact('post'));
    }

}
