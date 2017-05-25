<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\News;

class GroupsController extends Controller
{

    /**
     * Show the specified photo comment.
     *
     * @return Response
     */
    public function index()
    {
        $departments = \App\Department::all();
        $departments_array = [];

        foreach ($departments as $dep) {
            $department = [
                'id' => $dep->id,
                'name' => $dep->name,
                'specializations' => []
            ];
            $specializations_array = [];
            if ($dep->specializations->count() > 0) {
                foreach ($dep->specializations as $spec) {
                    $specialization = [
                        'id' => $spec->id,
                        'name' => $spec->name,
                        'groups' => []
                    ];
                    $groups_array = [];
                    if ($spec->groups->count() > 0) {
                        foreach ($spec->groups as $group) {
                            $groups_array[] = [
                                'id' => $group->id,
                                'code' => $group->code,
                                'course_number' => $group->course_number
                            ];
                        }
                        $specialization['groups'] = $groups_array;
                        $specializations_array[] = $specialization;
                    }
                }
                $department['specializations'] = $specializations_array;
            }
            $departments_array[] = $department;
        }

        return response()->json(
            $departments_array
        );
    }

}