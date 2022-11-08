@extends('front.admin.admin_font.admin_layout')
@section('them')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập Nhat Danh Mục Sản Phẩm</h4>
                <?php
                $messages = Session::get('message');
                if($messages){
                    echo '<p style="color:red;" class="text-non">',$messages,'</p>';
                    Session::put('message', null);
                }
                ?>
                @foreach($edit_category_product as $cate)

                <form class="forms-sample" action="{{URL::to('/update-category-product/'.$cate->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên danh mục</label>
                        <input type="text" value="{{$cate->name}}" class="form-control" name="category_name" id="exampleInputName1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Trạng thái</label>
                        <select class="form-control" name="trang_thai" id="exampleSelectGender">
                            <option value="1">Ẩn</option>
                            <option value="0">Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cập nhật danh mục</button>
                    <button class="btn btn-dark">Hủy</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
