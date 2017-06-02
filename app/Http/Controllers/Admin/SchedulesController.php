<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Schedule;
use Illuminate\Http\Request;
use Session;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $schedules = Schedule::join('groups', 'groups.id', '=', 'schedules.group_id')
                ->join('subjects', 'subjects.id', '=', 'schedules.subject_id')
                ->join('teachers', 'teachers.id', '=', 'schedules.teacher_id')
                ->select('schedules.*', 'groups.code as group_code', 'groups.id as groups_id',
                    'teachers.id as teachers_id', 'subjects.id as subjects_id')
                ->where('groups.code', 'LIKE', "%$keyword%")
                ->orWhere('teachers.fio', 'LIKE', "%$keyword%")
                ->orWhere('subjects.name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $schedules = Schedule::paginate($perPage);
        }

        return view('admin.schedules.index', compact('schedules'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Schedule::create($requestData);

        Session::flash('flash_message', 'Schedule added!');

        return redirect('admin/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $schedule = Schedule::findOrFail($id);
        $schedule->update($requestData);

        Session::flash('flash_message', 'Schedule updated!');

        return redirect('admin/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Schedule::destroy($id);

        Session::flash('flash_message', 'Schedule deleted!');

        return redirect('admin/schedules');
    }
}
