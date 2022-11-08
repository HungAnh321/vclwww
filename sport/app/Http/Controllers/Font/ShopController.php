<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Product;

use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function show($id){
        $product = Product::findOrFail($id);

        $categories = ProductCategory::all();

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRaing = count($product->productComments);
        if($countRaing!=0){
            $avgRating = $sumRating/$countRaing;
        }else{

        }
        $relateProduct = Product::where('product_category_id', $product->product_category_id)
            ->where('tag', $product->tag)
            ->limit(4)
            ->get();
        return view('front.shop.shop', compact('product', 'avgRating', 'relateProduct', 'categories'));
    }
    public function add_comment(Request $request){
        ProductComment::create($request->all());

        return redirect()->back();

    }
    public function index(Request $request){
        $categories = ProductCategory::all();
        $brands = Brand::all();

        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';

        $products = Product::where('name', 'like', '%'. $search. '%');

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($sortBy, $products, $perPage);

        $min_price = Product::min('price');
        $max_price = Product::max('price');


        return view('front.shop.index', compact('products', 'categories', 'brands', 'min_price', 'max_price'));
    }
    public function category($categoryName, Request $request){
        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';

        $categories = ProductCategory::all();
        $brands = Brand::all();

        $products = ProductCategory::where('name', $categoryName)->first()->product->query();

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($sortBy, $products, $perPage);


        return view('front.shop.index', compact('products', 'categories'));

    }
    public function sortAndPagination($sortBy, $products, $perPage){
        switch ($sortBy){
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'price_acs':
                $products = $products->orderBy('name');
                break;
            case 'price_dec':
                $products = $products->orderByDesc('name');
                break;
            case 'name_acs':
                $products = $products->orderBy('price');
                break;
            case 'name_dec':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');

        }
        $products = $products->paginate($perPage);

        $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);
        return $products;
    }
    public function filter($products, Request $request){

        //brand
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        //price

        $start_price = $request->start_price;
        $end_price = $request->end_price;

        $products = ($start_price != null && $end_price != null) ? $products->whereBetween('price', [$start_price, $end_price]) : $products;

        //color
        $color = $request->color;
        $products = $color != null
            ? $products->whereHas('productDetails', function ($query) use ($color){
                return $query->where('color', $color)->where('qty', '>', 0);
            })
            : $products;

        //size
        $size = $request->size;
        $products = $size != null
            ? $products->whereHas('productDetails', function ($query) use ($size){
                return $query->where('size', $size)->where('qty', '>', 0);
            })
            : $products;

        return $products;

    }


}
