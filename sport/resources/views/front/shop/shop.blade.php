@extends('front.layout.layout')
@section('title','Shop')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('public/front/img/'.$product->productImage[0]->path)}}" alt="Image">
                        </div>
                        @foreach($product->productImage as $productImage)
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('public/front/img/'.$productImage->path)}}" alt="Image">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$product->name}}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= $avgRating)
                                    <small class="fas fa-star"></small>
                                @else
                                    <small class="fa-regular fa-star"></small>
                                @endif
                            @endfor
                            <span>({{count($product->productComments)}})</span>

                        </div>
                    </div>
                    <div class="profile-desc">
                    @if($product->discount!=null)
                        <h3 class="font-weight-semi-bold mb-4">{{number_format($product->discount).' '.'VND'}}<span style="padding-left: 20px"><del>{{number_format($product->price).' '.'VND'}}</del></span></h3>
                    @else
                        <h3 class="font-weight-semi-bold mb-4">{{$product->price}}</h3>
                    @endif
                    </div>
                    <p class="mb-4">{{$product->content}}</p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Sizes:</strong>
                        <form>
                            @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-{{$productSize}}" name="size">
                                <label class="custom-control-label" for="size-{{$productSize}}">{{$productSize}}</label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Colors:</strong>
                        <form>
                            @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-{{$productColor}}" name="color">
                                <label class="custom-control-label" for="color-{{$productColor}}">{{$productColor}}</label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <p>{{$product->qty}} sản phẩm có sẵn</p>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on: </strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá ({{count($product->productComments)}})</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <p>{{$product->description}}</p>
                            </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Thông tin chi tiết sản phẩm</h4>
                           <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Danh mục: {{$product->productCategory->name}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Thương hiệu: {{$product->brand->name}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Nặng: {{$product->weight}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Đối tượng:
                                            @if($product->object==1)
                                                Nữ
                                            @elseif($product->object==2)
                                                Trẻ em
                                            @elseif($product->object==0)
                                                Nam
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">{{count($product->productComments)}} Đánh Giá</h4>
                                    @foreach($product->productComments as $productComment)
                                    <div class="media mb-4">
                                        <img src="{{asset('public/front/img/'.$productComment->user->avatar)}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{$productComment->name}}<small>  <i>{{date('d/m/20y', strtotime($productComment->created_at))}}</i></small></h6>
                                            <div class="text-primary mb-2">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i <= $productComment->rating)
                                                        <small class="fas fa-star"></small>
                                                    @else
                                                        <small class="fa-regular fa-star"></small>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p>{{$productComment->messages}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Đánh giá của bạn</h4>
                                    <small>Địa chỉ email của bạn sẽ không được công bố</small>
                                    <div class="d-flex my-3">
                                        <form action="" method="post">
                                            @csrf
{{--                                        <p class="mb-0 mr-2">Đánh giá * :</p>--}}
{{--                                        <div class="text-primary">--}}
{{--                                            --}}
{{--                                        </div>--}}
                                        <div class="personal-rating form-group mb-0">
                                            <h6>Đánh giá *: </h6>
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="user_id" value="2">
                                        <div class="form-group">
                                            <label for="message">Nội dung đánh giá *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" name="messages"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tên *</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi đánh giá của bạn" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm liên quan</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($relateProduct as $relateProduct)
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('public/front/img/'.$relateProduct->productImage[0]->path)}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="{{('/banhang/shop/product/'.$relateProduct->id)}}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$relateProduct->name}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{$relateProduct->discount}}</h5><h6 class="text-muted ml-2"><del>{{$relateProduct->price}}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

    </style>

@endsection



