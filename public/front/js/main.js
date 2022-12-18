
'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
    $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);


    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });


    /*----------------------------------------------------
     Language Flag js
    ----------------------------------------------------*/
    $(document).ready(function (e) {
        //no use
        try {
            var pages = $("#pages").msDropdown({
                on: {
                    change: function (data, ui) {
                        var val = data.value;
                        if (val != "")
                            window.location = val;
                    }
                }
            }).data("dd");

            var pagename = document.location.pathname.toString();
            pagename = pagename.split("/");
            pages.setIndexByValue(pagename[pagename.length - 1]);
            $("#ver").html(msBeautify.version.msDropdown);
        } catch (e) {
            // console.log(e);
        }
        $("#ver").html(msBeautify.version.msDropdown);

        //convert
        $(".language_drop").msDropdown({roundedBorder: false});
        $("#tech").data("dd");
    });
    /*-------------------
		Range Slider
	--------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max'),
        minValue = rangeSlider.data('min-value') !== '' ? rangeSlider.data('min-value') : minPrice,
        maxValue = rangeSlider.data('max-value') !== '' ? rangeSlider.data('max-value') : maxPrice;

    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val(ui.values[0] + ' 000₫');
            maxamount.val(ui.values[1] + ' 000₫');
        }
    });
    minamount.val(rangeSlider.slider("values", 0) + ' 000₫');
    maxamount.val(rangeSlider.slider("values", 1) + ' 000₫');

    /*-------------------
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
		Single Product
	--------------------*/
    $('.product-thumbs-track .pt').on('click', function () {
        $('.product-thumbs-track .pt').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product-big-img').attr('src');
        if (imgurl != bigImg) {
            $('.product-big-img').attr({src: imgurl});
            $('.zoomImg').attr({src: imgurl});
        }
    });

    $('.product-pic-zoom').zoom();

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();

        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        // $button.parent().find('input').val(newVal);
        if (newVal == 0) {
            return
        }

        var qtyProductShowPage = $button.parent().find('.qty-product');

        if (qtyProductShowPage.length) {// Nếu là ở trang CT sản phẩm  thì chỉ cần tăng giảm input
            qtyProductShowPage.val(newVal);
        } else {
            const rowId = $button.parent().find('input').data('rowid');
            // console.log(rowId);

            updateCart(rowId, newVal);
        }


    });
})(jQuery);
//js add cart
function addCart(productId, qty = 1) {
    $.ajax({
        type: 'GET',
        url: 'cart/add?' + $.param({productId: parseInt(productId), qty: parseInt(qty)}),
    })
        .done((response) => {
            $('.cart-count').text(response['count']);
            $('.select-total h5').text(response['total'] + ' 000₫');
            $('.cart-price').text(response['total'] + ' 000₫');
            // console.log(response);
            var cart = response['cart'];

            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find('tr[data-rowId="' + cart.rowId + '"]');

            if (cartHover_existItem.length) {
                cartHover_existItem.find('.product-selected p').text(cart.price + ' 000₫' + ' x ' + cart.qty);
            } else {
                var newItem =
                    '<tr data-rowId="' + cart.rowId + '">\n' +
                    '    <td class="si-pic"><img src="/front/img/products/' + cart.options.images[0].path + '" alt=""></td>\n' +
                    '    <td class="si-text">\n' +
                    '        <div class="product-selected">\n' +
                    '            <p>' + cart.price + ' 000₫ x ' + cart.qty + '</p>\n' +
                    '            <h6>' + cart.name + '</h6>\n' +
                    '        </div>\n' +
                    '    </td>\n' +
                    '    <td class="si-close">\n' +
                    '        <i class="ti-close" onclick=deleteCart(\'' + cart.rowId + '\')></i>\n' +
                    '    </td>\n' +
                    '</tr>'

                cartHover_tbody.append(newItem);
            }

            toastr.success('Đã thêm sản phẩm vào giỏ hàng.')
        })
        //if ajax truyeenf ko thành công ->
        .fail(() => {
            toastr.error('Lỗi, hãy thử lại!');
        })
}

function updateCart(rowId, qty) {
    $.ajax({
        type: "GET",
        url: "cart/update?" + $.param({'rowId': rowId, 'qty': qty}) //param là 1 stringquerry
    })
        .done((response) => {
            // $('.cart-count').text(response['count']);
            $('.select-total h5').text(response['total'] + ' 000₫');
            $('.cart-price').text(response['total'] + ' 000₫');

            // console.log(response);
            var cart = response['cart'];

            // Xử lý ở cart-hover
            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find('tr[data-rowId="' + rowId + '"]');

            cartHover_existItem.find('.product-selected p').text(cart.price + ' 000₫' + ' x ' + cart.qty);

            // Xử lý trong trang shop/cart

            $('.cart-total span').text(response['total'] + ' 000₫');

            var cart_tbody = $('.cart-table tbody');
            var cart_existItem = cart_tbody.find('tr[data-rowId="' + rowId + '"]');

            cart_existItem.find('.total-price').text(formatNumber(cart.price * cart.qty) + ' 000₫');
            cart_existItem.find('.pro-qty input').val(cart.qty);
        })
        .fail(() => {
            toastr.error('Lỗi, hãy thử lại!');
        })
}

function deleteCart(rowId) {
    $.ajax({
        type: 'GET',
        url: 'cart/delete?' + $.param({rowId: rowId})
    })
        .done((response) => {
            $('.cart-count').text(response['count']);
            $('.select-total h5').text(response['total'] + ' 000₫');
            $('.cart-price').text(response['total'] + ' 000₫');

            // console.log(response);
            var cart = response['cart'];

            // Xử lý ở cart-hover
            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find('tr[data-rowId="' + rowId + '"]');

            cartHover_existItem.remove();

            // Xử lý trong trang shop/cart
            $('.cart-total span').text(response['total'] + ' 000₫');

            var cart_tbody = $('.cart-table tbody');
            var cart_existItem = cart_tbody.find('tr[data-rowId="' + rowId + '"]');

            cart_existItem.remove();

            toastr.success('Xoá sản phẩm thành công!')
        })
        .fail(() => {
            toastr.error('Lỗi, hãy thử lại!');
        })
}

function formatNumber(x) {
    return x.toLocaleString().replace(',', ' ');
}

//chỉnh thư viện toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
