<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class GiftsController extends Controller
{

    /**
     * Show the specified photo comment.
     *
     * @return Response
     */
    public function index()
    {
        $gifts = \App\Gift::all();
        $gifts_array = [];
        foreach ($gifts as $n) {
            $gifts_array[] = [
                'id' => $n->id,
                'name' => $n->name,
                'description' => $n->description,
                'price' => $n->price,
                'created_at' => $n->created_at,
                'image_path' => '/images/news/'.$n->image_name,
                'image_thumb' => '/thumbnails/news/'.$n->image_name
            ];
        }

        return response()->json(
            $gifts_array
        );
    }

}