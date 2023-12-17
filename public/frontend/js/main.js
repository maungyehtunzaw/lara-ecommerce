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
    });

    // Add to Cart Click
    // $('#addToCart').on('click', function (e) {
    $(document).on('click', '#addToCart', function(e) {
        e.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var cartTotalQty = $('#cartQty').text();
        console.log(cartTotalQty+"total");
        console.log('add to cart');
        console.log(_token);

        var product_id = $(this).data('id');
        var qty = $(this).parent().parent().find('input').val();
        console.log(qty);
        if (qty === undefined) { // for posting from listing page
            qty = 1;
        }
        console.log("nowQty"+qty);
        var url = '/addtocart'
        $.ajax({
          headers: {
                    'X-CSRF-TOKEN': _token,
                    // 'Content-Type': 'application/json',
                },

            url: url,
            method: "POST",
            data: {product_id: product_id, qty: qty},
            success: function (data) {
                console.log('success');
                console.log(data);
                if (data.success === true) {
                    let totalQty = parseInt(cartTotalQty) + parseInt(qty);
                    $('span#cartQty').each(function(){
                        console.log("hereistotalqty now"+totalQty);
                        $(this).text(totalQty);
                    });
                    // $('#cartQty').text(totalQty);
                    Toastify({
                        text: data.message,
                        className: "info",
                        style: {
                          background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                      }).showToast();
                }
            }
        });
    });

    // remove from cart ajax
    // $('#removeFromCartBtn').bind('click', function (e) {
    $(document).on('click', '#removeFromCartBtn', function(e) {
        e.preventDefault();
        console.log("remove from cart");
        var _token = $('meta[name="csrf-token"]').attr('content');
        var product_id = $(this).data('id');
        var cartTotalQty = $('#cartQty').text();
        var url = '/removefromcart'
        $.ajax({
          headers: {
                    'X-CSRF-TOKEN': _token,
                    // 'Content-Type': 'application/json',
                },

            url: url,
            method: "POST",
            data: {product_id: product_id},
            success: function (data) {
                console.log('success');
                console.log(data);
                if (data.success === true) {
                    let totalQty = parseInt(cartTotalQty) - parseInt(data.qty);
                    $('span#cartQty').each(function(){
                        $(this).text(totalQty);
                    });
                    $('#cartRow_'+data.product_id).remove();
                    Toastify({
                        text: data.message,
                        className: "info",
                        style: {
                          background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                      }).showToast();
                      calculateSubTotal();

                }
            },
            error: function (err) {
                console.log('error');
                console.log(err);
                alert("show error handle message");
            }
        });
    });

    function onQtyChange(){
        var _token = $('meta[name="csrf-token"]').attr('content');
        var product_id = $(this).data('id');
        var qty = $(this).parent().parent().find('input').val();
        var url = '/updatecart'
        $.ajax({
          headers: {
                    'X-CSRF-TOKEN': _token,
                    // 'Content-Type': 'application/json',
                },

            url: url,
            method: "POST",
            data: {product_id: product_id, qty: qty},
            success: function (data) {
                console.log('success');
                console.log(data);
                if (data.success === true) {


                }
            }
        });
    }

    function calculateSubTotal() {
        console.log("calculateSubTotal");
       var total = 0;
        $("td#totalAmt").each(function() {
            console.log($(this).text());
            total += parseInt($(this).text());
        });
        $("#cartTotalAmount").text(total);

    }

})(jQuery);

