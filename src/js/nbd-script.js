
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

    $('.quantity-plus').click(updateQuantity('+'));
    $('.quantity-minus').click(updateQuantity('-'));

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
            success: function (response) {
                $('.order-total .woocommerce-Price-amount.amount, .woocommerce-mini-cart__total .woocommerce-Price-amount.amount').replaceWith(response);
                updateCartCount();
            },
        });
    }

})