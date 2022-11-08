@extends('front.admin.admin_font.admin_layout')
@section('them')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liệt Kê Danh Mục Sản Phẩm</h4>
                </p>
                <div class="table-responsive">
                    <?php
                    $messages = Session::get('message');
                    if($messages){
                        echo '<p style="color:red;" class="text-non">',$messages,'</p>';
                        Session::put('message', null);
                    }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th> # </th>
                            <th> Tên danh mục </th>
                            <th> Trạng thái </th>
                            <th> Ngày thêm </th>
                            <th> Xóa </th>
                            <th> Sửa </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ProductCategory as $cate)
                        <tr style="text-align: center">
                            <td> {{$cate->id}} </td>
                            <td> {{$cate->name}} </td>
                            <td>
                                    <?php
                                if($cate->trang_thai==0){
                                    ?>
                                <a href="{{URL::to('/unactive-category-product/'.$cate->id)}}"><span class="fa-solid fa-eye"></span></a>
                                    <?php
                                }else{
                                    ?>
                                <a href="{{URL::to('/active-category-product/'.$cate->id)}}"><span class="fa-sharp fa-solid fa-eye-slash"></span></a>
                                    <?php
                                }
                                    ?>
                            </td>
                            <td> {{$cate->created_at}} </td>
                            <td>
                                <a class="btn btn-danger btn-rounded" onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{URL::to('/delete-category-product/'.$cate->id)}}">Xóa</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-rounded" href="{{URL::to('/edit-category-product/'.$cate->id)}}">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
