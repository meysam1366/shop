<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Slider;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::limit(10)->get();
        $brands = Brand::limit(10)->get();
        $sliders = Slider::all();
        return view('welcome',compact('products','brands','sliders'));
    }

    public function my_account()
    {
        return view('front.user.my_account');
    }
}
