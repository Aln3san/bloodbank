<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['clients', 'category'])->latest()->get();
        return view('website.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['clients', 'category'])->findOrFail($id);

        $posts = Post::with(['clients', 'category'])
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(10) 
            ->get();

        return view('website.post.show', compact('post', 'posts'));
    }
}
