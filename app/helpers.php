<?php

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $requested_path = request()->path();
        return (strpos($requested_path, $path) !== false) ? ' class="active"' : '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($array)
    {
        $requested_path = request()->path();
        foreach ($array as $path) {
            if(strpos($requested_path, $path) !== false) return ' in';
        }
        return '';
    }
}

if (!function_exists('specializationsWithDepartmentsList')) {
    function specializationsWithDepartmentsList()
    {
        $specializations = App\Specialization::all();
        $values = [];
        foreach($specializations as $spec) {
            $values[$spec->id] = $spec->department->name.' - '.$spec->name;
        }
        return $values;
    }
}

if (!function_exists('auditoriesWithBuildingsList')) {
    function auditoriesWithBuildingsList()
    {
        $auditory = App\Auditory::all();
        $values = [];
        foreach($auditory as $audi) {
            $values[$audi->id] = $audi->building->name.': '.$audi->code;
        }
        return $values;
    }
}