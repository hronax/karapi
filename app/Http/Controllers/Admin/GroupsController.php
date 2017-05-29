<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Group;
use Illuminate\Http\Request;
use Session;

class GroupsController extends Controller
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
            $groups = Group::join('specializations', 'specializations.id', '=', 'groups.specialization_id')
                ->select('groups.*', 'specializations.name as specialization_name', 'specializations.id as specialization_id', 'specializations.code as specialization_code')
                ->where('groups.code', 'LIKE', "%$keyword%")
				->orWhere('course_number', 'LIKE', "%$keyword%")
				->orWhere('specializations.name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $groups = Group::paginate($perPage);
        }

        return view('admin.groups.index', compact('groups'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.groups.create');
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
        
        Group::create($requestData);

        Session::flash('flash_message', 'Group added!');

        return redirect('admin/groups');
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
        $group = Group::findOrFail($id);

        return view('admin.groups.show', compact('group'));
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
        $group = Group::findOrFail($id);

        return view('admin.groups.edit', compact('group'));
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
        
        $group = Group::findOrFail($id);
        $group->update($requestData);

        Session::flash('flash_message', 'Group updated!');

        return redirect('admin/groups');
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
        Group::destroy($id);

        Session::flash('flash_message', 'Group deleted!');

        return redirect('admin/groups');
    }
}
