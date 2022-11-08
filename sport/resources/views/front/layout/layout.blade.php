<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('public/front/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/front/lib/animate/animate.min.css" rel="stylesheet')}}">
    <link href="{{asset('public/front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/front/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">Sign in</button>
                        <button class="dropdown-item" type="button">Sign up</button>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Sport</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="shop">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" value="{{request('search')}}" placeholder="Tìm kiếm sản phẩm">
                    <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30 position-relative">



    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
{{--                    @foreach($categories as $cate)--}}
{{--                    <a href="{{URL::to('/shop/'.$cate->name)}}" class="nav-item nav-link">{{$cate->name}}</a>--}}
{{--                    @endforeach--}}
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{('./')}}" class="nav-item nav-link active">Trang chủ</a>
                        <a href="{{('./shop')}}" class="nav-item nav-link">Shop</a>
                        <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>

                        <a href="{{URL::to('/cart')}}" class="btn cart-btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle cart-count" style="padding-bottom: 2px;">{{Cart::count()}}</span>
                            <div class="cart-infor">
                                @if(Cart::count()>0)
                            <div class="select-item">
                                <table class="table table-light table-borderless table-hover text-center mb-0">
                                    <tbody class="align-middle">
                                    @foreach(Cart::content() as $cart)
                                        <tr data-rowId="{{$cart->rowId}}">
                                            <td class="align-middle"><img class="name1" src="{{asset('public/front/img/'.$cart->options->images[0]->path)}}" alt="" style="width: 80px;"></td>
{{--                                            <td>{{$cart->name}}</td>--}}
{{--                                            <td class="align-middle">--}}
{{--                                                {{$cart->qty}}--}}
{{--                                            </td>--}}
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>{{number_format($cart->price).' '.'VND'}} X {{$cart->qty}}</p>
                                                    <h6>{{$cart->name}}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle">{{number_format($cart->price * $cart->qty).' '.'VND'}}</td>
                                            <td class="align-middle">
                                                <i onclick="removeCart('{{$cart->rowId}}')" class="fa fa-times"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                    <div class="select-total">
                                        <span>Total:</span>
                                        <h5>{{Cart::total()}}</h5>
                                    </div>
                                    <div class="select-button">

                                    </div>
                                    <div class="cart-price">
                                        <span>Total:</span>
                                        <h5>{{Cart::total()}}</h5>
                                    </div>
                                @else
                                    <img class="name" src="{{asset('public/front/img/empty-cart.jpg')}}" alt="">
                                    <h5 style="background: #111111">Giỏ hàng của bạn đang trống!</h5>
                                @endif
                                <div class="text-right">

                                </div>
                            </div>
                        </a>

                        <style>

                            .cart-infor {
                                position:absolute;
                                height: 0px;
                                width: 400px;
                                background-color: white;
                                right: 0px;
                                top : 65px;
                                z-index: 5;
                                border: 1px black solid;
                                /*display: none;*/
                                transition: all .5s ease;
                                opacity: 0;

                            }
                            .cart-btn .cart-infor img .name {
                                height: 0;
                            }


                            .cart-btn:hover  .cart-infor{
                                /*display: block;*/
                                opacity: 1;
                                height: fit-content;
                                transform: translateY(0);

                            }
                            .cart-btn:hover .cart-infor  .name{
                                height: 320px;
                            }
                            .cart-btn:hover .cart-infor .name1{
                                height: 75px;
                            }

                        </style>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')

<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
            <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                    <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                by
                <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{asset('public/front/img/payments.png')}}" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/front/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('public/front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('public/front/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('public/front/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('public/front/js/main1.js')}}"></script>
<script src="https://kit.fontawesome.com/3d8803ff5e.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $( document).ready(function() {
        $( "#slider-range" ).slider({
            orientation: "horizontal",
            range: true,
            min: 30,
            max: 1000,
            values: [ 100, 400 ],
            slide: function( event, ui ) {
                $( "#amount" ).val(ui.values[ 0 ] + " VND"  + " ---> " +  ui.values[ 1 ] + " VND"  );
                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
            }
        });
        $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + " VND"  + " ---> " +
             $( "#slider-range" ).slider( "values", 1 ) + " VND" );
    } );
</script>
<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span style="cursor: pointer" class="dec qtybtn">-</span>');
    proQty.append('<span style="cursor: pointer" class="inc qtybtn">+</span>');
    proQty.on('click','.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);

        //update_cart
        const rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId, newVal);
    });
    function updateCart(rowId, qty){
        $.ajax({
            type:"GET",
            url:"cart/updates",
            data:{rowId: rowId, qty: qty},
            success: function (response){
                $('.cart-count').text(response['count']);
                $('.cart-price').text('$'+response['total']);
                $('.select-total h5').text('$'+response['total']);

                var cartHover_tbody = $('.select-item tbody');
                var cartHover_existItem = cartHover_tbody.find("tr"+"[data-rowId='" + response['cart'].rowId + "']");
                if(qty === 0){
                    cartHover_existItem.remove();
                }else{
                    cartHover_existItem.find('.product-selected p').text('$'+response['cart'].price.toFixed(2)+'x' +response['cart'].qty);
                }

                var cart_tbody = $('.cart-table tbody');
                var cart_existItem = cart_tbody.find("tr"+"[data-rowid='" + response['cart'].rowId + "']");
                if(qty === 0){
                    cart_existItem.remove();
                }else{
                    cart_existItem.find('.total-price').text('$'+response['cart'].price.toFixed(2));
                }

                $('.subtotal span').text('$'+response['subtotal']);
                $('.cart-total span').text('$'+response['total']);

                alert('Cập nhật giỏ hàng thành công!');
                console.log(response);
                location.reload();
            },
            error: function (error){
                alert('Cập nhật lỗi');
                console.log(error);
            },

        });
    }
</script>
<script>
    function addCart(productId) {
        $.ajax({
            type:"GET",
            url:"cart/add",
            data:{productId: productId},
            success: function (response){
                $('.cart-count').text(response['count']);
                $('.cart-price').text('$'+response['total']);
                $('.select-total h5').text('$'+response['total']);

                var cartHover_tbody = $('.select-item tbody');
                var cartHover_existItem = cartHover_tbody.find("tr"+"[data-rowId='" + response['cart'].rowId + "']");

                if(cartHover_existItem.length){
                    cartHover_existItem.find('.product-selected p').text('$'+response['cart'].price.toFixed(2)+'x' +response['cart'].qty);
                }else{
                    var newItem = '<tr data-rowId="' + response['cart'].rowId + '">\n'+
                    '<td class="align-middle">\n'+
                    '<img class="name1" src="public/front/img/' + response['cart'].options.image[0].path + '" alt="" style="width: 80px;"></td>\n'+
                    '<td class="si-text">\n'+
                    '<div class="product-selected">\n'+
                    '<p>$'+response['cart'].price.toFixed(2)+'x'+response['cart'].qty+'</p>\n'+
                    '<h6>'+ response['cart'].name +'</h6>\n'+
                    '</div>\n'+
                    '</td>\n'+
                    '<td class="align-middle"><i onclick="removeCart(\''+response['cart'].rowId+'\')" class="fa fa-times"></i></td>\n'+
                    '</tr>';
                    cartHover_tbody.append(newItem);
                }
                alert('Thêm giỏ hàng thành công! \n Product:' + response['cart'].name);
                console.log(response);
                location.reload();
            },
            error: function (response){
                alert('Thêm giỏ hàng lỗi');
                console.log(response);
            },
        });
    }
    function removeCart(rowId){
        $.ajax({
            type: "GET",
            url: "cart/delete",
            data: {rowId: rowId},
            success: function (response){

                $('.cart-count').text(response['count']);
                $('.cart-price').text('$'+response['total']);
                $('.select-total h5').text('$'+response['total']);

                var cartHover_tbody = $('.select-item tbody');
                var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + rowId + "']");
                cartHover_existItem.remove();


                var cart_tbody = $('.cart-table tbody');
                var cart_existItem = cart_tbody.find("tr" + "[data-rowId='" + rowId + "']");
                cart_existItem.remove();

                alert('Xóa thành công! \n Product:' + response['cart'].name);
                console.log(response);
            },
            error: function (response){
                alert('Xóa thanh coong');
                console.log(response);
            },
        });
    }
    function destroyCart(){
        $.ajax({
            type: "GET",
            url: "cart/destroy",
            data: {},
            success: function (response){

                $('.cart-count').text('0');
                $('.cart-price').text('0');
                $('.select-total h5').text('0');

                var cartHover_tbody = $('.select-item tbody');
                cartHover_tbody.children().remove();


                var cart_tbody = $('.cart-table tbody');
                cart_tbody.children().remove();

                $('.subtotal span').text('0');
                $('.cart-total span').text('0');

                alert('Xóa thành công! \n Product:' + response['cart'].name);
                console.log(response);
            },
            error: function (response){
                alert('Xóa lỗi');
                console.log(response);
            },
        });
    }
</script>

</body>
</html>

