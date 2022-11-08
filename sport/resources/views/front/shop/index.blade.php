@extends('front.layout.layout')
@section('title','Shop')
@section('content')
<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            {{--  Brand Start          --}}
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thương hiệu</span></h5>
            <div class="bg-light p-4 mb-30">
                <form action="">
                    @foreach($brands as $brands)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input"
                                   {{(request("brand")[$brands->id] ?? '') == 'on' ? 'checked' : ''}}
                                   id="brand-{{$brands->id}}"
                                   name="brand[{{$brands->id}}]"
                                   onchange="this.form.submit();">
                        <label class="custom-control-label" for="brand-{{$brands->id}}">{{$brands->name}}</label>
                    </div>
                    @endforeach
                </form>
            </div>
{{--            end brand--}}
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc Theo Giá</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <p>
                        <label for="amount">Lọc giá</label>
                        <input type="text" id="amount" readonly style="border:0; color:#ffc800; font-weight:bold;">
                        <input type="hidden" name="start_price" id="start_price">
                        <input type="hidden" name="end_price" id="end_price">
                    </p>

                    <div id="slider-range"></div>
                    <br>
                    <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-warning">
                </form>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc theo màu sắc</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="color" value="black" onchange="this.form.submit()" id="color-1"
                            {{request('color') == 'black' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="color" value="white" onchange="this.form.submit()" id="color-2"
                            {{request('color') == 'white' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="color" value="red" onchange="this.form.submit()" id="color-3"
                            {{request('color') == 'red' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="color-3">Red</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="color" value="blue" onchange="this.form.submit()" id="color-4"
                            {{request('color') == 'blue' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="color-4">Blue</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="color" value="green" onchange="this.form.submit()" id="color-5"
                            {{request('color') == 'green' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="color-5">Green</label>
                    </div>
                </form>
            </div>
            <!-- Color End -->

            <!-- Size Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc theo size</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="size" value="xs" onchange="this.form.submit()" id="size-1"
                            {{request('size') == 'xs' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="size" value="s" onchange="this.form.submit()" id="size-2"
                            {{request('size') == 's' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="size" value="m" onchange="this.form.submit()" id="size-3"
                            {{request('size') == 'm' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="size" value="l" onchange="this.form.submit()" id="size-4"
                            {{request('size') == 'l' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="size" value="xl" onchange="this.form.submit()" id="size-5"
                            {{request('size') == 'xl' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </form>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <form action="">
                        <div class="ml-2">

                            <div class="select2-results__options">
                                <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                    <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Sắp xếp: Mới nhất</option>
                                    <option {{request('sort_by') == 'oldest' ? 'selected' : ''}}  value="oldest">Sắp xếp: Cũ nhất</option>
                                    <option {{request('sort_by') == 'price_acs' ? 'selected' : ''}} value="price_acs">Sắp xếp: Giá cao đến thấp</option>
                                    <option {{request('sort_by') == 'price_dec' ? 'selected' : ''}} value="price_dec">Sắp xếp: Giá thấp đến cao</option>
                                    <option {{request('sort_by') == 'name_acs' ? 'selected' : ''}} value="name_acs">Sắp xếp: Theo tên A-Z</option>
                                    <option {{request('sort_by') == 'name_dec' ? 'selected' : ''}} value="name_dec">Sắp xếp: Theo tên Z-A</option>
                                </select>
                                <select onchange="this.form.submit();" class="p-show" name="show">
                                    <option {{request('show') == '6' ? 'selected' : ''}} value="6">Hiển thị: 6</option>
                                    <option {{request('show') == '9' ? 'selected' : ''}} value="9">Hiển thị: 9</option>
                                    <option {{request('show') == '12' ? 'selected' : ''}} value="12">Hiển thị: 12</option>
                                </select>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
                @foreach($products as $pros)
                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('public/front/img/'.$pros->productImage[0]->path)}}" alt="">
                            <div class="product-action">
{{--                                <a class="btn btn-outline-dark btn-square name" href="{{URL::to('/cart/add/'.$pros->id)}}"><i class="fa fa-shopping-cart"></i></a>--}}
                                <a class="btn btn-outline-dark btn-square name" href="javascript:addCart({{$pros->id}})"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="{{('/banhang/shop/product/'.$pros->id)}}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$pros->name}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{number_format($pros->discount).' '.'VND'}}</h5><h6 class="text-muted ml-2"><del>{{number_format($pros->price).' '.'VND'}}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div style="padding-left: 500px">{{$products->links()}}</div>
{{--                <div class="col-12">--}}
{{--                    <nav>--}}
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>--}}
{{--                            <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection
