<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = array_merge(['0' => 'انتخاب دسته بندی پدر'],Category::all()->pluck('title','id')->toArray());
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = new Category();
        $title = $request->title;
        $parent_id = $request->parent_id ? $request->parent_id : null;
        $width = $request->width;
        $height = $request->height;
        $status = $request->status == 1 ? 1 : 0;

        $dir_thumb = public_path() . "/images/category/thumbnail/";
        $dir = public_path() . "/images/category/";

        $file = $request->file('img-thumbnail');

        if (isset($file)) {
            $fileName = $file->getClientOriginalName();
            $image = Helper::uploadImage($file,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = '';
        }

        $category->create([
            'title' => $title,
            'parent_id' => $parent_id,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height,
            'status' => $status,
            'order' => 1,
        ]);

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = array_merge(['0' => 'انتخاب دسته بندی پدر'],Category::all()->where('id','!=',$id)->pluck('title','id')->toArray());
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = Category::findOrFail($id);
        $order = $category->order;
        $title = $request->title;
        $parent_id = $request->parent_id ? $request->parent_id : null;
        $width = $request->width;
        $height = $request->height;
        $status = $request->status == 1 ? 1 : 0;

        $dir_thumb = public_path() . "/images/category/thumbnail/";
        $dir = public_path() . "/images/category/";

        $file = $request->file('img-thumbnail');

        if (isset($file)) {
            $fileName = $file->getClientOriginalName();
            $image = Helper::uploadImage($file,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = $category->img_thumbnail;
        }

        $category->update([
            'title' => $title,
            'parent_id' => $parent_id,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height,
            'status' => $status,
            'order' => $order,
        ]);

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success','حذف دسته بندی با موفقیت انجام شد');
    }
}
