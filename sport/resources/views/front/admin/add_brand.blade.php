@extends('front.admin.admin_font.admin_layout')
@section('them')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm Thương Hiệu Sản Phẩm</h4>
                <?php
                $messages = Session::get('message');
                if($messages){
                    echo '<p style="color:red;" class="text-non">',$messages,'</p>';
                    Session::put('message', null);
                }
                ?>
                <form class="forms-sample" action="{{URL::to('/save-brand')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên thương hiệu</label>
                        <input type="text" class="form-control" name="brand_name" id="exampleInputName1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Trạng thái</label>
                        <select class="form-control" name="trang_thai" id="exampleSelectGender">
                            <option value="1">Ẩn</option>
                            <option value="0">Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Thêm thương hiệu</button>
                    <button class="btn btn-dark">Hủy</button>
                </form>
            </div>
        </div>
    </div>

@endsection
