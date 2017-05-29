<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class CoursesController extends Controller
{

    /**
     * Show the specified photo comment.
     *
     * @return Response
     */
    public function index()
    {
        $courses = \App\Course::paginate(10);
        $courses_array = [];
        foreach ($courses as $n) {
            $courses_array[] = [
                'id' => $n->id,
                'name' => $n->name,
                'description' => $n->description,
                'start_date' => $n->start_date,
                'created_at' => $n->created_at,
                'image_path' => '/images/courses/'.$n->image_name,
                'image_thumb' => '/thumbnails/courses/'.$n->image_name
            ];
        }

        return response()->json(
            $courses_array
        );
    }

}