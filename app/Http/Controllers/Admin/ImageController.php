<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Product;
use App\Helpers\Helper;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('admin.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('title','id')->toArray();
        return view('admin.image.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $validated = $request->validated();
        $dir = "/images/image_product/";

        $files = $request->file('src');
        $product_id = $request->product_id;

        if (isset($files)) {
            foreach ($files as $file) {
                $image = Helper::uploadImageProduct($file,$dir);
                Image::create([
                    'product_id' => $product_id,
                    'src' => $image
                ]);
            }
        }

        return redirect(route('image.index'));
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
        $image = Image::findOrFail($id);
        $products = Product::all()->pluck('title','id')->toArray();
        return view('admin.image.edit',compact('image','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return back()->with('success','تصویر محصول موردنظر شما با موفقیت حذف شد');
    }
}
