<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Sevice\Product\ProductSeviceInterface;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productSevice;
    public function __construct(ProductSeviceInterface $productSevice)
    {
        $this->productSevice = $productSevice;
    }

    public function add(Request $request){
        if($request->ajax()){
            $product = $this->productSevice->find($request->productId);
            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImage,
                ],

            ]);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

        return back();
    }
    public function category(){



        return view('front.shop.index');

    }
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();


        return view('front.shop.cart', compact('carts', 'total', 'subtotal'));
    }

    public function delete(Request $request){
        if($request->ajax()){
            $product = $this->productSevice->find($request->productId);
            $response['cart'] = Cart::remove($request->rowId);

            $response['subtotal'] = Cart::subtotal();
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

        return back();
    }

//    public function delete(Request $request){
//        if($request->ajax()){
//            $response['cart'] = Cart::remove($request->rowId);
//
//            $response['count'] = Cart::count();
//            $response['total'] = Cart::total();
//            $response['subtotal'] = Cart::subtotal();
//
//            return $response;
//        }
//        return back();
//    }
    public function destroy(){
        Card::destroy();

        return back();
    }
    public function updates(Request $request){
        if($request->ajax()){
            $response['cart'] = Cart::update($request->rowId, $request->qty);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }

}
