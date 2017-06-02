<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class TeachersController extends Controller
{

    /**
     * Show the specified photo comment.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = \App\Teacher::all();
        $teachers_array = [];
        foreach ($teachers as $teacher) {
            $teachers_array[] = [
                'id' => $teacher->id,
                'name' => $teacher->fio
            ];
        }

        return response()->json(
            $teachers_array
        );
    }

}