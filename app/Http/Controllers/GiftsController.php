<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class NewsController extends Controller
{

    /**
     * Show the specified photo comment.
     *
     * @return Response
     */
    public function index()
    {
        $news = \App\News::paginate(5);
        $news_array = [];
        foreach ($news as $n) {
            $news_array[] = [
                'id' => $n->id,
                'title' => $n->title,
                'text' => $n->text,
                'category' => $n->category->name,
                'tags' => $n->tagNames(),
                'department' => $n->department,
                'created_at' => $n->created_at,
                'period' => $n->period,
                'type' => ($n->type == 1 ? 'announce' : 'news'),
                'image_path' => '/images/news/'.$n->image_name,
                'image_thumb' => '/thumbnails/news/'.$n->image_name
            ];
        }

        return response()->json(
            $news_array
        );
    }

}