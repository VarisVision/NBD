
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
})