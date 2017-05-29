<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use Illuminate\Http\Request;
use Session;

class CoursesController extends Controller
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
            $courses = Course::where('name', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('start_date', 'LIKE', "%$keyword%")
				->orWhere('image_name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $courses = Course::paginate($perPage);
        }

        return view('admin.courses.index', compact('courses'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.courses.create');
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

            $uploadPath = public_path('images/courses');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/courses');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        Course::create($requestData);

        Session::flash('flash_message', 'Course added!');

        return redirect('admin/courses');
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
        $course = Course::findOrFail($id);

        return view('admin.courses.show', compact('course'));
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
        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('course'));
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

            $uploadPath = public_path('images/courses');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/courses');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        $course = Course::findOrFail($id);
        $course->update($requestData);

        Session::flash('flash_message', 'Course updated!');

        return redirect('admin/courses');
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
        Course::destroy($id);

        Session::flash('flash_message', 'Course deleted!');

        return redirect('admin/courses');
    }
}
