<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SliderRequest  $request
     *
     * @return void
     */
    public function store(SliderRequest $request)
    {
        $validated = $request->validated();
        $title = $request->title;
        $subtitle = $request->subtitle;
        $link = $request->link;
        $image = $request->file('image');
        if (isset($image)) {
            $dir = '/images/slider/';
            $image = Helper::uploadImageProduct($image,$dir);
        }else {
            $image = '';
        }

        Slider::create([
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'image' => $image,
        ]);

        return redirect(route('slider.index'));
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
        $slider = Slider::query()->findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SliderRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(SliderRequest $request, $id)
    {
        $validated = $request->validated();
        $slider = Slider::query()->findOrFail($id);
        $title = $request->title;
        $subtitle = $request->subtitle;
        $link = $request->link;
        $image = $request->file('image');
        if (isset($image)) {
            $dir = '/images/slider/';
            $images = Helper::uploadImageProduct($image,$dir);
        }else {
            $images = '';
        }



        $slider->update([
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'image' => $images,
        ]);

        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::query()->findOrFail($id);
        $slider->delete();

        return back()->with('success','اسلایدر موردنظر شما با موفقیت حدف شد');
    }
}
