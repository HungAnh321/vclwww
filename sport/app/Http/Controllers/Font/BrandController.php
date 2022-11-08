<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class BrandController extends Controller
{
    public function add_brand(){
        return view('front.admin.add_brand');
    }
    public function all_brand(){
        $Brand = Brand::get();
        return view('front.admin.all_brand', compact('Brand'));
    }
    public function edit_brand($brand_id){
        $edit_brand = Brand::where('id', $brand_id)->get();
        return view('front.admin.edit_brand',compact('edit_brand'));
    }
    public function unactive_brand($brand_id){
        Brand::where('id',$brand_id)->update(['trang_thai'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công!');
        return Redirect::to('all-brand');
    }
    public function active_brand($brand_id){
        Brand::where('id',$brand_id)->update(['trang_thai'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công!');
        return Redirect::to('all-brand');
    }
    public function save_brand(Request $request){
        $data = array();
        $data['name'] = $request->brand_name;
        $data['trang_thai'] = $request->trang_thai;

        Brand::insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-brand');
    }
    public function delete_brand($brand_id){
        Brand::where('id', $brand_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-brand');
    }

    public function update_brand(Request $request, $brand_id){
        $data = array();
        $data['name'] = $request->brand_name;
        $data['trang_thai'] = $request->trang_thai;

        ProductCategory::where('id', $brand_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-brand');
    }
}
