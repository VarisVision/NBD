
jQuery(document).ready(function($){

    const mobileNavSettings = {
        slideFrom: 'left',
        width: '350px',
    }

    const mobileNav = $('#nbd-header__mobile--menu').SlideOutPanel( mobileNavSettings );

    $(".nbd-header__mobile--btn").on("click", function() {
        mobileNav.open();
    });

    $('.add-to-cart-variation').click(function(e) {
        e.preventDefault();
        
        var product_id = $(this).data('product-id');
        var variation_id = $(this).data('variation-id');

        $.ajax({
            type: 'POST',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'add_variation_to_cart',
                product_id: product_id,
                variation_id: variation_id,
                security: my_ajax_object.nonce
            },
            success: function(response) {
                // Handle the response, e.g., show a success message or update the cart widget.
            }
        });
    });

    console.log("kokot");
})