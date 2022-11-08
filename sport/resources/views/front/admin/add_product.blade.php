@extends('front.admin.admin_font.admin_layout')
@section('them')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm Sản Phẩm</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input name="name_product" type="text" class="form-control" id="exampleInputName1" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Nội dung sản phẩm</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh sản phẩm</label>
                        <input type="file" name="product_image" class="form-control-file" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Trạng thái</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Ẩn</option>
                            <option>Hiện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection
