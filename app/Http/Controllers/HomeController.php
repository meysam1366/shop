<?php

namespace App\Http\Controllers;

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
        return view('welcome',compact('products'));
    }

    public function my_account()
    {
        return view('front.user.my_account');
    }
}
