<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FavouretController extends Controller
{
  use ApiResponse;

  public function listFavourites()
  {
    $client = auth()->user()->posts;
    $data = [
      'Favourites' => $client,
    ];
    return response()->json($data);
  }

  public function toggleFavourite($id)
  {
    $client = auth()->user();

    if ($client->posts()->where('post_id', $id)->exists()) {
      $client->posts()->detach($id);
      $message = 'Removed from favourites';
    } else {
      $client->posts()->attach($id);
      $message = 'Added to favourites';
    }

    return $this->successResponse(null, $message);
  }
}
