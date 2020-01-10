<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\Product;
use App\Category;
use App\OptionProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        return view('admin.option.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = array_merge(['0' => 'انتخاب نام مشخصه پدر'],Option::all()->pluck('item_key','id')->toArray());
//        $categories = array_merge(['0' => 'انتخاب دسته بندی پدر'],Category::all()->where('parent_id',null)->pluck('title','id')->toArray());
        $categories = array_merge(['0' => 'انتخاب دسته بندی پدر'],Category::all()->pluck('title','id')->toArray());
        $fields = array_merge(['0' => 'انتخاب نوع فیلد'],['text'=>'text','textarea'=>'textarea','radio'=>'radio']);
        return view('admin.option.create',compact('categories','options','fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OptionRequest  $request
     *
     * @return void
     */
    public function store(OptionRequest $request)
    {
        $validated = $request->validated();
        $category_id = $request->category_id;
        $parent_id = $request->parent_id == 0 ? null : $request->parent_id;
        $item_key = $request->item_key;
        $field = $request->field;
        $status = $request->status;

        Option::create([
            'category_id' => $category_id,
            'parent_id' => $parent_id,
            'item_key' => $item_key,
            'field' => $field,
            'status' => $status,
        ]);

        return redirect(route('option.index'));
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
        $option = Option::findOrFail($id);
        $options = array_merge(['0' => 'انتخاب نام مشخصه پدر'],Option::all()->pluck('item_key','id')->toArray());
        $categories = array_merge(['0' => 'انتخاب دسته بندی'],Category::all()->where('parent_id',null)->pluck('title','id')->toArray());
        $fields = array_merge(['0' => 'انتخاب نوع فیلد'],['text'=>'text','textarea'=>'textarea','radio'=>'radio']);
        return view('admin.option.edit',compact('option','categories','fields','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OptionRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(OptionRequest $request, $id)
    {
        $validated = $request->validated();
        $option = Option::findOrFail($id);
        $category_id = $request->category_id;
        $parent_id = $request->parent_id == 0 ? null : $request->parent_id;
        $item_key = $request->item_key;
        $field = $request->field;
        $status = $request->status;

        $option->update([
            'category_id' => $category_id,
            'parent_id' => $parent_id,
            'item_key' => $item_key,
            'field' => $field,
            'status' => $status,
        ]);

        return redirect(route('option.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return back()->with('success','مشخصه محصول موردنظر با موفقیت حدف شد');
    }

    public function option_product()
    {
        $options = Option::all()->pluck('item_key','id')->toArray();
        $products = Product::all()->pluck('title','id')->toArray();
        return view('admin.option.option_product',compact('options','products'));
    }

    public function option_product_store(Request $request)
    {
        $option_id = $request->option_id;
        $product_id = $request->product_id;
        $item_value = $request->item_value;

        OptionProduct::create([
            'option_id' => $option_id,
            'product_id' => $product_id,
            'item_value' => $item_value,
        ]);

        return redirect(route('product.index'));
    }

    public function get_item_field(Request $request)
    {
        $option = Option::findOrFail($request->option_id);

        return response()->json($option);
    }
}
