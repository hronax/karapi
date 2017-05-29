<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Auditory;
use Illuminate\Http\Request;
use Session;

class AuditoriesController extends Controller
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
            $auditories = Auditory::join('buildings', 'buildings.id', '=', 'auditories.building_id')
                ->select('auditories.*', 'buildings.name as buildings_name', 'buildings.id as buildings_id')
                ->where('code', 'LIKE', "%$keyword%")
				->orWhere('buildings.name', 'LIKE', "%$keyword%")
            ->paginate($perPage);
//            var_dump($auditories->toSql());die;
        } else {
            $auditories = Auditory::paginate($perPage);
        }

        return view('admin.auditories.index', compact('auditories'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auditories.create');
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
        
        Auditory::create($requestData);

        Session::flash('flash_message', 'Auditory added!');

        return redirect('admin/auditories');
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
        $auditory = Auditory::findOrFail($id);

        return view('admin.auditories.show', compact('auditory'));
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
        $auditory = Auditory::findOrFail($id);

        return view('admin.auditories.edit', compact('auditory'));
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
        
        $auditory = Auditory::findOrFail($id);
        $auditory->update($requestData);

        Session::flash('flash_message', 'Auditory updated!');

        return redirect('admin/auditories');
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
        Auditory::destroy($id);

        Session::flash('flash_message', 'Auditory deleted!');

        return redirect('admin/auditories');
    }
}
