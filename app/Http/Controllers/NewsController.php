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
     * @param $type
     *
     * @return Response
     */
    public function index($type)
    {
        $news = [];
        // top news
        if ($type == 3) {
            $news = \App\News::where('is_top', 1)->orderBy('created_at', 'desc')->paginate(5);
        } elseif ($type == 1 || $type == 2) {
            $news = \App\News::where('type', $type)->orderBy('created_at', 'desc')->paginate(5);
        }

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