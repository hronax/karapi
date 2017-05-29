<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pair;
use Illuminate\Http\Request;
use Session;

class PairsController extends Controller
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
            $pairs = Pair::join('buildings', 'buildings.id', '=', 'pairs.building_id')
                ->select('pairs.*', 'buildings.name as buildings_name', 'buildings.id as buildings_id')
                ->where('pair_number', 'LIKE', "%$keyword%")
                ->orWhere('buildings.name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $pairs = Pair::paginate($perPage);
        }

        return view('admin.pairs.index', compact('pairs'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pairs.create');
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
        
        Pair::create($requestData);

        Session::flash('flash_message', 'Pair added!');

        return redirect('admin/pairs');
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
        $pair = Pair::findOrFail($id);

        return view('admin.pairs.show', compact('pair'));
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
        $pair = Pair::findOrFail($id);

        return view('admin.pairs.edit', compact('pair'));
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
        
        $pair = Pair::findOrFail($id);
        $pair->update($requestData);

        Session::flash('flash_message', 'Pair updated!');

        return redirect('admin/pairs');
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
        Pair::destroy($id);

        Session::flash('flash_message', 'Pair deleted!');

        return redirect('admin/pairs');
    }
}
