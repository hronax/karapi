<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exam;
use Illuminate\Http\Request;
use Session;

class ExamsController extends Controller
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
            $exams = Exam::join('groups', 'groups.id', '=', 'exams.group_id')
                ->join('subjects', 'subjects.id', '=', 'exams.subject_id')
                ->join('teachers', 'teachers.id', '=', 'exams.teacher_id')
                ->select('exams.*', 'groups.code as group_code', 'groups.id as groups_id',
                    'teachers.id as teachers_id', 'subjects.id as subjects_id')
                ->where('groups.code', 'LIKE', "%$keyword%")
				->orWhere('teachers.fio', 'LIKE', "%$keyword%")
				->orWhere('subjects.name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $exams = Exam::paginate($perPage);
        }

        return view('admin.exams.index', compact('exams'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.exams.create');
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
        
        Exam::create($requestData);

        Session::flash('flash_message', 'Exam added!');

        return redirect('admin/exams');
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
        $exam = Exam::findOrFail($id);

        return view('admin.exams.show', compact('exam'));
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
        $exam = Exam::findOrFail($id);

        return view('admin.exams.edit', compact('exam'));
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
        
        $exam = Exam::findOrFail($id);
        $exam->update($requestData);

        Session::flash('flash_message', 'Exam updated!');

        return redirect('admin/exams');
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
        Exam::destroy($id);

        Session::flash('flash_message', 'Exam deleted!');

        return redirect('admin/exams');
    }
}
