<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use Session;

session_start();
class ProductController extends Controller
{
    public function add_product(){
        return view('front.admin.add_product');
    }
}
