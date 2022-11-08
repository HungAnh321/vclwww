(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);

        //update_cart
        const rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId, newVal);
    });
    function updateCart(rowId, qty){
        $.ajax({
            type:"GET",
            url:"cart/update",
            data:{rowId: rowId, qty: qty},
            success: function (response){
                alert('Cập nhật giỏ hàng thành công!');
                console.log(response);
                location.reload();
            },
            error: function (error){
                alert('Cập nhat lỗi');
                console.log(error);
            },

        });
    }
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
                alert('Xóa lỗi');
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

})(jQuery);

