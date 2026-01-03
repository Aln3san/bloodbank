<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create posts')->only(['create', 'store']);
        $this->middleware('permission:read posts')->only(['index', 'show']);
        $this->middleware('permission:update posts')->only(['edit', 'update']);
        $this->middleware('permission:delete posts')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        // Handle uploaded photo if present
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('posts', 'public');
            $data['photo'] = $path;
        }

        // Ensure category_id is used (Post fillable expects 'category_id')
        // validated already contains 'category_id' per PostRequest

        $post = Post::create($data);

        return redirect()->route('posts.index')->with('success', __('messages.item_created'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $post = Post::findOrFail($id);
    $categories = Category::all();
    return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Redirect show route to edit page to reuse the edit view
        return redirect()->route('posts.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();

        // Handle uploaded photo if present
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('posts', 'public');
            $data['photo'] = $path;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', __('messages.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        // return redirect()->route('posts.index')->with( __("messages.item_deleted"));
        return response()->json([
            'message' => __("messages.item_deleted")
        ]);
    }
}
