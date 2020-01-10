<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Helpers\Helper;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BrandRequest  $request
     *
     * @return void
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        $brand = new Brand();
        $title = $request->title;
        $website = $request->website;
        $description = $request->description;
        $width = $request->width;
        $height = $request->height;

        $dir_thumb = public_path() . "/images/brand/thumbnail/";
        $dir = public_path() . "/images/brand/";

        $file = $request->file('img-thumbnail');

        if (isset($file)) {
            $fileName = $file->getClientOriginalName();
            $image = Helper::uploadImage($file,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = '';
        }

        $brand->create([
            'title' => $title,
            'website' => $website,
            'description' => $description,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height
        ]);

        return redirect(route('brand.index'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BrandRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(BrandRequest $request, $id)
    {
        $validated = $request->validated();
        $brand = Brand::findOrFail($id);
        $title = $request->title;
        $website = $request->website;
        $description = $request->description;
        $width = $request->width;
        $height = $request->height;

        $dir_thumb = public_path() . "/images/brand/thumbnail/";
        $dir = public_path() . "/images/brand/";

        $file = $request->file('img-thumbnail');

        if (isset($file)) {
            $fileName = $file->getClientOriginalName();
            $image = Helper::uploadImage($file,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = $brand->img_thumbnail;
        }

        $brand->update([
            'title' => $title,
            'website' => $website,
            'description' => $description,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height,
        ]);

        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return back()->with('success','حذف برند با موفقیت انجام شد');
    }
}
