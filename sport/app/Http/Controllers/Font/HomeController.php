<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
//        $men_product = Product::where('featured', true)->where('object', 0)->get;
//        $women_product = Product::where('featured', true)->where('object', 1)->get;
        $featured_product = Product::where('featured', true)->get();
        $category = ProductCategory::get();
        $categories = ProductCategory::all();

        return view('front.index', compact('featured_product','category', 'categories'));
    }
    public function category($categoryName, Request $request){

        $categories = ProductCategory::all();

        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery()->paginate();

        return view('front.shop.index', compact('products', 'categories'));

    }
}
