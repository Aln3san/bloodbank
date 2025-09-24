<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
  use ApiResponse;
  public function posts(){
    $posts = Post::all();
    $data = [
      'Posts' => $posts
    ];
    return $this->successResponse($data, 'Get Posts api Successfully', 200);
  }

  public function post($id){
    $post = Post::findOrFail($id);
    if(!$post){
      return $this->errorResponse('Post Not Found', 404);
    }
    $data = [
      'Post' => $post
    ];
    return $this->successResponse($data, 'Get Post api Successfully', 200);
  }
}
