<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use Illuminate\Http\Request;
use Session;

class NewsController extends Controller
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
            $news = News::join('categories', 'categories.id', '=', 'news.category_id')
                ->select('news.*', 'categories.id as categories_id')
                ->where('title', 'LIKE', "%$keyword%")
				->orWhere('text', 'LIKE', "%$keyword%")
				->orWhere('period', 'LIKE', "%$keyword%")
				->orWhere('categories.name', 'LIKE', "%$keyword%")
                ->orderBy('created_at', 'desc')
				->paginate($perPage);
        } else {
            $news = News::orderBy('created_at', 'desc')->paginate($perPage);
        }

        return view('admin.news.index', compact('news'))->with('keyword', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
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

            $uploadPath = public_path('images/news');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/news');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        News::create($requestData);

        Session::flash('flash_message', 'News added!');

        return redirect('admin/news');
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
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));
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
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
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

            $uploadPath = public_path('images/news');

            $extension = $file->getClientOriginalExtension();
            $fileName = substr(md5(time()), 0, 8) . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $requestData['image_name'] = $fileName;

            $img = \Image::make($uploadPath.'/'.$fileName);
            $destinationPath = public_path('thumbnails/news');
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
        }

        $news = News::findOrFail($id);
        $news->update($requestData);

        Session::flash('flash_message', 'News updated!');

        return redirect('admin/news');
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
        News::destroy($id);

        Session::flash('flash_message', 'News deleted!');

        return redirect('admin/news');
    }
}
