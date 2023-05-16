<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function shops(Post $post)
    {
        return view('posts/shops')->with(['posts' => $post->getByLimit()]);
    }
}