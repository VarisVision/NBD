
jQuery(document).ready(function($){

    $('.add-to-cart-variation').click(function(e) {
        e.preventDefault();
        
        const productId = $(this).data('product-id');
        const variationId = $(this).data('variation-id');

        $.ajax({
            type: 'POST',
            url: nbdAjaxObject.ajaxUrl,
            data: {
                action: 'add_variation_to_cart',
                product_id: productId,
                variation_id: variationId,
                security: nbdAjaxObject.nonce
            },
            success: function(response) {
                $('#nbd-side-cart').click();
                updateCartCount();
                $('.widget_shopping_cart_content').html(response);
            }
        });
    });

    $('.nbd-product-card__image, .nbd-product-card__info').hover(function(){
        if (window.innerWidth > 900) {
            $(this).parent().find('.nbd-product-card__link').hide();
            $(this).parent().find('.nbd-product-card__quick-add').css('display', 'flex');
        }}, function() {
            if (window.innerWidth > 900) {
                $(this).parent().find('.nbd-product-card__quick-add').hide();
                $(this).parent().find('.nbd-product-card__link').show();
            }
    });

    $(".nbd-footer__back-to-top p").click(function(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $(".nbd-footer__copyright--year").text((new Date).getFullYear());

    function updateCartCount() {
        $.ajax({
            type: 'POST',
            url: nbdAjaxObject.ajaxUrl,

            data: { action: 'get_cart_count' },
            success: function(response) {
                $('.cart-items-count').html(response);
            }
        });
    }

    $('body').on('removed_from_cart', function() {
        $.ajax({
            type: 'GET',
            url: nbdAjaxObject.ajaxUrl,
            data: {
                action: 'get_cart_count'
            },
            success: function(response) {
                $('.cart-items-count').html(response);
            }
        });
    });

    $(".nbd-side-cart").on('click', '.quantity-plus', updateQuantity('+'));
    $(".nbd-side-cart").on('click', '.quantity-minus', updateQuantity('-'));

    function updateQuantity(action) {
        return function () {
            let cartItemKey = $(this).data('cart-item-key');
            let quantityInput = $(this).siblings('.quantity-input');
            let currentQuantity = parseInt(quantityInput.text());
            let newQuantity;
            if (action === '+') {
                newQuantity = currentQuantity + 1;
            } 
            else {
                newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;
            }

            quantityInput.text(newQuantity);
            updateCartItemQuantity(cartItemKey, newQuantity);
        };
    }

    function updateCartItemQuantity(cartItemKey, quantity) {
        $.ajax({
            type: 'POST',
            url: nbdAjaxObject.ajaxUrl,
            data: {
                action: 'update_cart_item_quantity',
                cart_item_key: cartItemKey,
                quantity: quantity,
            },
            // todo: update quantity in normal cart
            success: function (response) {

                let data = JSON.parse(response);

                $('.woocommerce-mini-cart__total .woocommerce-Price-amount.amount').replaceWith(data.subtotal);
                
                for (let productId in data.product_prices) {
                    let productInfo = data.product_prices[productId];
                    let priceElement = $('.product-price[data-product-id="' + productId + '"]');
            
                    priceElement.html(productInfo.subtotal);
                }
                
                updateCartCount();
            },
        });
    }


    $('.checkout_coupon_btn').on('click', function(e){
        e.preventDefault(); // Prevent the form from submitting

        var couponCode = $('#coupon_code').val(); // Replace with your actual input field's ID or class

        $.ajax({
            url: nbdAjaxObject.ajaxUrl,
            type: 'POST',
            dataType: 'json', // Expect a JSON response
            data: {
                action: 'apply_coupon',
                coupon_code: couponCode
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data); // Display the success message
                } else {
                    alert('Coupon application failed: ' + response.data); // Display the failure message
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + errorThrown); // Handle any AJAX errors
            }
        });
    });

    $('form.checkout input').attr('autocomplete', 'off');

    $(".woocommerce-billing-fields__field-wrapper p input").each(function(i, e) {
        if(!$(e).val('')) {
            $(this).parent().siblings('label').addClass('has-value');
        }
        
    })

    $(".nbd.woocommerce-checkout input, .nbd.woocommerce-checkout textarea").focus(function() {
        $(this).parent().siblings('label').addClass('has-value');
    }).blur(function() {
        var text_val = $(this).val();
        if(text_val === "") {
            $(this).parent().siblings('label').removeClass('has-value');
        }
    });

})