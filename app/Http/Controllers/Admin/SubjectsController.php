<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subject;
use Illuminate\Http\Request;
use Session;

class SubjectsController extends Controller
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
            $subjects = Subject::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $subjects = Subject::paginate($perPage);
        }

        return view('admin.subjects.index', compact('subjects'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.subjects.create');
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
        
        Subject::create($requestData);

        Session::flash('flash_message', 'Subject added!');

        return redirect('admin/subjects');
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
        $subject = Subject::findOrFail($id);

        return view('admin.subjects.show', compact('subject'));
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
        $subject = Subject::findOrFail($id);

        return view('admin.subjects.edit', compact('subject'));
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
        
        $subject = Subject::findOrFail($id);
        $subject->update($requestData);

        Session::flash('flash_message', 'Subject updated!');

        return redirect('admin/subjects');
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
        Subject::destroy($id);

        Session::flash('flash_message', 'Subject deleted!');

        return redirect('admin/subjects');
    }
}
