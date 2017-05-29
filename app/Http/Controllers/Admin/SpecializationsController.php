<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Specialization;
use Illuminate\Http\Request;
use Session;

class SpecializationsController extends Controller
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
            $specializations = Specialization::join('departments', 'departments.id', '=', 'specializations.department_id')->where('specializations.name', 'LIKE', "%$keyword%")
                ->select('specializations.*', 'departments.name as department_name', 'departments.id as department_id')
				->orWhere('code', 'LIKE', "%$keyword%")
				->orWhere('departments.name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $specializations = Specialization::paginate($perPage);
        }

        return view('admin.specializations.index', compact('specializations'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.specializations.create');
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
        
        Specialization::create($requestData);

        Session::flash('flash_message', 'Specialization added!');

        return redirect('admin/specializations');
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
        $specialization = Specialization::findOrFail($id);

        return view('admin.specializations.show', compact('specialization'));
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
        $specialization = Specialization::findOrFail($id);

        return view('admin.specializations.edit', compact('specialization'));
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
        
        $specialization = Specialization::findOrFail($id);
        $specialization->update($requestData);

        Session::flash('flash_message', 'Specialization updated!');

        return redirect('admin/specializations');
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
        Specialization::destroy($id);

        Session::flash('flash_message', 'Specialization deleted!');

        return redirect('admin/specializations');
    }
}
