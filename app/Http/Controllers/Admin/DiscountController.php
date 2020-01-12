<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Discount;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DiscountRequest  $request
     *
     * @return void
     */
    public function store(DiscountRequest $request)
    {
        $validated = $request->validated();
        $title = $request->title;
        $code = $request->code;
        $start_time = $this->explodeDate($request->start_time);
        $end_time = $this->explodeDate($request->end_time);
        $count_use = $request->count_use;
        $discount = $request->discount;

        Discount::create([
            'title' => $title,
            'code' => $code,
            'discount' => $discount,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'count_use' => $count_use,
        ]);

        return redirect(route('discount.index'));
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
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit',compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        $validated = $request->validated();
        $discount = Discount::findOrFail($id);
        $title = $request->title;
        $code = $request->code;
        $start_time = Helper::explodeDate($request->start_time);
        $end_time = Helper::explodeDate($request->end_time);
        $count_use = $request->count_use;
        $discount = $request->discount;

        $discount->update([
            'title' => $title,
            'code' => $code,
            'discount' => $discount,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'count_use' => $count_use,
        ]);

        return redirect(route('discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return back()->with('success','تخفیف موردنظر با موفقیت حذف شد');
    }

    public function discount_product()
    {
        $products = Product::all()->pluck('title','id')->toArray();
        $discounts = Discount::all()->pluck('title','id','code')->toArray();
        return view('admin.discount.discount_product',compact('products','discounts'));
    }
}
