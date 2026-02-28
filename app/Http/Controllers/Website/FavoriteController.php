<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $posts = auth('website')->user()->posts()->with(['clients', 'category'])->latest()->get();
        return view('website.post.favorite', compact('posts'));
    }

    public function toggle(Post $post)
    {
        auth('website')->user()->posts()->toggle($post->id);
        return back();
    }
}
