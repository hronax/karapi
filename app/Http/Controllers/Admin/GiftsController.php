<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gift;
use Illuminate\Http\Request;
use Session;

class GiftsController extends Controller
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
            $gifts = Gift::where('name', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('price', 'LIKE', "%$keyword%")
				->orWhere('image_name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $gifts = Gift::paginate($perPage);
        }

        return view('admin.gifts.index', compact('gifts'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.gifts.create');
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
        

        if ($request->hasFile('image_name')) {
            $file = $request['image_name'];

            $uploadPath = public_path('images/gifts');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/gifts');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        Gift::create($requestData);

        Session::flash('flash_message', 'Gift added!');

        return redirect('admin/gifts');
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
        $gift = Gift::findOrFail($id);

        return view('admin.gifts.show', compact('gift'));
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
        $gift = Gift::findOrFail($id);

        return view('admin.gifts.edit', compact('gift'));
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

        if ($request->hasFile('image_name')) {
            $file = $request['image_name'];

            $uploadPath = public_path('images/gifts');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/gifts');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        $gift = Gift::findOrFail($id);
        $gift->update($requestData);

        Session::flash('flash_message', 'Gift updated!');

        return redirect('admin/gifts');
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
        Gift::destroy($id);

        Session::flash('flash_message', 'Gift deleted!');

        return redirect('admin/gifts');
    }
}
