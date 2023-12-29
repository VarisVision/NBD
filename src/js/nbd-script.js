
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
                $(this).siblings('.quantity-minus').removeClass('disabled');
            } 
            else {
                newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;
                if(newQuantity < 2) {
                    $(this).addClass('disabled');
                }
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
                
                for (let variationId in data.product_prices) {
                    let productInfo = data.product_prices[variationId];
                    let priceElement = $('.product-price[data-product-id="' + variationId + '"]');
            
                    priceElement.html(productInfo.subtotal);
                }
                
                updateCartCount();
            },
        });
    }
    
    $('.nbd-mini-cart .quantity').each(function(i, e){
        if($(e).find('.quantity-minus').hasClass('disabled') && $(e).find('.quantity-input').text() > 1){
            $(this).find('.quantity-minus').removeClass('disabled');
        }
    });
})