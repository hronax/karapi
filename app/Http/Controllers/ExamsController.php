<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class ExamsController extends Controller
{

    /**
     * Show the specified photo comment.
     * @param $group_id
     *
     * @return Response
     */
    public function index($group_id)
    {
        $exams = \App\Exam::where('group_id', $group_id);
        $exams_array = [];
        foreach ($exams->cursor() as $exam) {
            $exams_array[] = [
                'subject' => $exam->subject->name,
                'type' => ($exam->type == 1 ? 'exam' : 'zalik'),
                'building' => $exam->auditory->building->name,
                'auditory' => $exam->auditory->code,
                'teacher' => $exam->teacher->fio,
                'pass_date' => $exam->pass_date
            ];
        }

        return response()->json(
            $exams_array
        );
    }

}