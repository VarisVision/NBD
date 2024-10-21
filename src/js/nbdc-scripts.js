
jQuery(document).ready(function($){
    function setSquare(classes) {
        classes.forEach(className => {
            $(className).each(function() {
                const width = $(this).width();
                $(this).height(width);
            });
        });
    }

    const classesToSquare = ['.nbdc-product-card__images', '.nbdc-blog__article--image', '.nbdc-single-product__slide', '.nbdc-single-product .slick-list'];

    setSquare(classesToSquare);

    $(window).resize(function() {
        setTimeout(function() { 
            setSquare(classesToSquare);
        }, 100);
    });

    //Homepage quick add to cart
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

    //Single-product page add to cart
    $('.nbdc-add-to-cart__button').click(function(e) {
        e.preventDefault();

        const productId = $(".nbdc-add-to-cart__product-id").val();
        const variationId = $(".nbdc-add-to-cart__variation-id").val();

        if(variationId != "") {
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
        }
    });

    $(".nbdc-footer__back-to-top p").click(function(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $(".nbdc-footer__copyright--year").text((new Date).getFullYear());

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

    $('.nbdc-mini-cart .quantity').each(function(i, e){
        if($(e).find('.quantity-minus').hasClass('disabled') && $(e).find('.quantity-input').text() > 1){
            $(this).find('.quantity-minus').removeClass('disabled');
        }
    });

    $('a[href^="/#"], a[href^="/sk/#"]').click(function(e) {
        e.preventDefault();
        let targetId = $(this).attr('href').replace(/^\/(sk\/)?#/, '#');
        let basePath = window.location.pathname.startsWith('/sk/') ? '/sk/' : '/';
        
        if (basePath === window.location.pathname) {
            scrollToSection(targetId);
        } else {
            window.location.href = basePath + targetId;
        }
    });
    
    function scrollToSection(targetId) {
        if ($(targetId).length) {
            $('html, body').animate({
                scrollTop: $(targetId).offset().top - 58
            }, 'slow');
        }
    }

    $(document).ready(function() {
        let hash = window.location.hash;
        if (hash) {
            scrollToSection(hash);
        }
    });
});