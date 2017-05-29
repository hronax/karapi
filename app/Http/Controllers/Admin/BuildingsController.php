<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Building;
use Illuminate\Http\Request;
use Session;

class BuildingsController extends Controller
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
            $buildings = Building::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $buildings = Building::paginate($perPage);
        }

        return view('admin.buildings.index', compact('buildings'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.buildings.create');
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
        
        Building::create($requestData);

        Session::flash('flash_message', 'Building added!');

        return redirect('admin/buildings');
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
        $building = Building::findOrFail($id);

        return view('admin.buildings.show', compact('building'));
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
        $building = Building::findOrFail($id);

        return view('admin.buildings.edit', compact('building'));
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
        
        $building = Building::findOrFail($id);
        $building->update($requestData);

        Session::flash('flash_message', 'Building updated!');

        return redirect('admin/buildings');
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
        Building::destroy($id);

        Session::flash('flash_message', 'Building deleted!');

        return redirect('admin/buildings');
    }
}
