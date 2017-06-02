<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Change;
use App\Auditory;
use App\Pair;
use Illuminate\Http\Request;
use Session;

class ChangesController extends Controller
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
            $changes = Change::join('groups', 'groups.id', '=', 'changes.group_id')
                ->join('subjects', 'subjects.id', '=', 'changes.subject_id')
                ->select('changes.*', 'groups.code as group_code', 'groups.id as groups_id',
                    'subjects.id as subjects_id')
                ->where('groups.code', 'LIKE', "%$keyword%")
                ->orWhere('subjects.name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $changes = Change::paginate($perPage);
        }

        return view('admin.changes.index', compact('changes'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.changes.create');
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

        $auditory = Auditory::findOrFail($requestData['auditory_id']);
        $pair = Pair::where('pair_number', $requestData['pair_id'])->where('building_id', $auditory->building_id)->first();
        $requestData['pair_id'] = $pair->id;
        Change::create($requestData);

        Session::flash('flash_message', 'Change added!');

        return redirect('admin/changes');
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
        $change = Change::findOrFail($id);

        return view('admin.changes.show', compact('change'));
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
        $change = Change::findOrFail($id);

        return view('admin.changes.edit', compact('change'));
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
        $auditory = Auditory::findOrFail($requestData['auditory_id']);
        $pair = Pair::where('pair_number', $requestData['pair_id'])->where('building_id', $auditory->building_id)->first();
        $requestData['pair_id'] = $pair->id;
        
        $change = Change::findOrFail($id);
        $change->update($requestData);

        Session::flash('flash_message', 'Change updated!');

        return redirect('admin/changes');
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
        Change::destroy($id);

        Session::flash('flash_message', 'Change deleted!');

        return redirect('admin/changes');
    }
}
