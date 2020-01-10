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
        $related_products = Product::where('category_id',$product->category->id)->where('id','!=',$product->id)->get();
        return view('front.product.single_product',compact('product','related_products'));
    }
}
