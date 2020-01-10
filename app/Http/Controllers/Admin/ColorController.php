<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Requests\ColorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ColorRequest  $request
     *
     * @return void
     */
    public function store(ColorRequest $request)
    {
        $validated = $request->validated();
        $color = $request->title;
        $palette = $request->palette;

        Color::create([
            'title' => $color,
            'palette' => $palette,
        ]);

        return redirect(route('color.index'));
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
        $color = Color::findOrFail($id);
        return view('admin.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ColorRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(ColorRequest $request, $id)
    {
        $color = Color::findOrFail($id);
        $title = $request->title;
        $palette = $request->palette;
        $color->update([
            'title' => $title,
            'palette' => $palette,
        ]);

        return redirect(route('color.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return back()->with('success','رنگ مورد نظر با موفقیت حدف شد');
    }
}
