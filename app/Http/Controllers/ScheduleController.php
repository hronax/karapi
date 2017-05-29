<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class ScheduleController extends Controller
{

    /**
     * Show the specified photo comment.
     * @param $group_id
     *
     * @return Response
     */
    public function index($group_id)
    {
        $schedules = \App\Schedule::where('group_id', $group_id);
        $changes = \App\Change::where('group_id', $group_id)->whereDate('date', '>=', date("Y-m-d H:i:s", time()))->whereDate('date', '<=', date("Y-m-d H:i:s", time()+3600*24*7));

        $result = $this->format_schedule($schedules, $changes);

        return response()->json(
            $result
        );
    }

    /**
     * Show the specified photo comment.
     * @param $teacher_id
     *
     * @return Response
     */
    public function by_teacher($teacher_id)
    {
        $schedules = \App\Schedule::where('teacher_id', $teacher_id);
        $changes = \App\Change::where('teacher_id', $teacher_id)->whereDate('date', '>=', date("Y-m-d H:i:s", time()))->whereDate('date', '<=', date("Y-m-d H:i:s", time()+3600*24*7));

        $result = $this->format_schedule($schedules, $changes);

        return response()->json(
            $result
        );
    }



    private function format_schedule($schedules, $changes) {
        $regular_array = [];
        $top_week_array = [];
        $bottom_week_array = [];
        $changes_array = [];
        foreach ($schedules->cursor() as $schedule) {
            $pair = [
                'week_day' => $schedule->week_day,
                'subject' => $schedule->subject->name,
                'building' => $schedule->auditory->building->name,
                'auditory' => $schedule->auditory->code,
                'teacher' => $schedule->teacher->fio,
                'class_number' => $schedule->pair->pair_number,
                'time_start' => $schedule->pair->time_start,
                'time_end' => $schedule->pair->time_end,
            ];
            $pos = $schedule->position;
            if ($pos == 0) {
                $regular_array[] = $pair;
            } elseif ($pos == 1) {
                $top_week_array[] = $pair;
            } elseif ($pos == 2) {
                $bottom_week_array[] = $pair;
            }
        }

        foreach ($changes->cursor() as $change) {
            $changes_array[] = [
                'date' => $change->date,
                'week_day' => intval(date('w', strtotime($change->date))),
                'subject' => $change->subject->name,
                'building' => $change->auditory->building->name,
                'auditory' => $change->auditory->code,
                'teacher' => $change->teacher->fio,
                'class_number' => $change->pair->pair_number,
                'time_start' => $change->pair->time_start,
                'time_end' => $change->pair->time_end,
            ];
        }

        return [
            'regular' => $regular_array,
            'top_week' => $top_week_array,
            'bottom_week' => $bottom_week_array,
            'changes' => $changes_array
        ];
    }

}