<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;


session_start();

class CategoryController extends Controller
{
    public function add_category_product(){
        return view('front.admin.add_category_product');
    }
    public function all_category_product(){
        $ProductCategory = ProductCategory::get();
        return view('front.admin.all_category_product', compact('ProductCategory'));
    }
    public function edit_category_product($category_product_id){
        $edit_category_product = ProductCategory::where('id', $category_product_id)->get();
        $manager_category_product = view('front.admin.edit_category_product',compact('edit_category_product'));
        return view('front.admin.admin_font.admin_layout',compact('manager_category_product'));
    }
    public function unactive_category_product($category_product_id){
        ProductCategory::where('id',$category_product_id)->update(['trang_thai'=>1]);
        Session::put('message','Ẩn sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        ProductCategory::where('id',$category_product_id)->update(['trang_thai'=>0]);
        Session::put('message','Hiện sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    public function save_category_product(Request $request){
        $data = array();
        $data['name'] = $request->category_name;
        $data['trang_thai'] = $request->trang_thai;

        ProductCategory::insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product');
    }
    public function delete_category_product($category_product_id){
        ProductCategory::where('id', $category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }

    public function update_category_product(Request $request, $category_product_id){
        $data = array();
        $data['name'] = $request->category_name;
        $data['trang_thai'] = $request->trang_thai;

        ProductCategory::where('id', $category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
}
