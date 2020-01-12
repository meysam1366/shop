<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use App\Special;
use App\Category;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->pluck('title','id')->toArray();
        $brands = Brand::all()->pluck('title','id')->toArray();
        return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     *
     * @return void
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $title = $request->title;
        $slug = $request->slug;
        $excerpt = strip_tags($request->excerpt);
        $details = strip_tags($request->details);
        $category_id = $request->category_id;
        $price = $request->price;
        $count = $request->count;
        $img_thumbnail = $request->file('img-thumbnail');
        $width = $request->width;
        $height = $request->height;
        $brand_id = $request->brand_id;
        $status = $request->status;
        $user_id = 1;

        $dir = "/images/product/";
        $dir_thumb = "/images/product/thumbnail/";

        if (isset($img_thumbnail)) {
            $fileName = $img_thumbnail->getClientOriginalName();
            $image = Helper::uploadImage($img_thumbnail,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = '';
        }

        Product::create([
            'user_id' => $user_id,
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'details' => $details,
            'price' => $price,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height,
            'category_id' => $category_id,
            'count' => $count,
            'brand_id' => $brand_id,
            'status' => $status,
        ]);

        return redirect(route('product.index'));
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
        $product = Product::findOrFail($id);
        $categories = Category::where('status',1)->pluck('title','id')->toArray();
        $brands = Brand::all()->pluck('title','id')->toArray();
        return view('admin.product.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(ProductRequest $request, $id)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($id);
        $title = $request->title;
        $slug = $request->slug;
        $excerpt = strip_tags($request->excerpt);
        $details = strip_tags($request->details);
        $category_id = $request->category_id;
        $price = $request->price;
        $count = $request->count;
        $img_thumbnail = $request->file('img-thumbnail');
        $width = $request->width;
        $height = $request->height;
        $brand_id = $request->brand_id;
        $status = $request->status;

        $dir = "/images/product/";
        $dir_thumb = "/images/product/thumbnail/";

        if (isset($img_thumbnail)) {
            $fileName = $img_thumbnail->getClientOriginalName();
            $image = Helper::uploadImage($img_thumbnail,$fileName,$width,$height,$dir,$dir_thumb);
        }else {
            $image = $product->img_thumbnail;
        }

        $product->update([
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'details' => $details,
            'price' => $price,
            'img_thumbnail' => $image,
            'width' => $width,
            'height' => $height,
            'category_id' => $category_id,
            'count' => $count,
            'brand_id' => $brand_id,
            'status' => $status,
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success','محصول موردنظر با موفقیت حذف شد');
    }

    public function specials()
    {
        $specials = Special::all();
        return view('admin.product.specials',compact('specials'));
    }

    public function special_create()
    {
        $products = Product::all()->pluck('title','id')->toArray();
        return view('admin.product.special_create',compact('products'));
    }

    public function special_store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'discount' => 'required',
        ]);

        $product_id = $request->product_id;
        $start_time = Helper::explodeDate($request->start_time);
        $end_time = Helper::explodeDate($request->end_time);
        $discount = $request->discount;

        Special::create([
            'title' => '-',
            'product_id' => $product_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'discount' => $discount,
        ]);

        return redirect(route('specials'));
    }
}
