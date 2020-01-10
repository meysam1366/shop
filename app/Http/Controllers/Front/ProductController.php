<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function single_product($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('front.product.single_product',compact('product'));
    }
}
