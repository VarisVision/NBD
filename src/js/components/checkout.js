jQuery(document).ready(function($){
    $('.checkout_coupon_btn').on('click', function(e){
        e.preventDefault();

        var couponCode = $('#coupon_code').val();

        $.ajax({
            url: nbdAjaxObject.ajaxUrl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'apply_coupon',
                coupon_code: couponCode
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data);
                } else {
                    alert('Coupon application failed: ' + response.data);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + errorThrown);
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
        if($(this).is('#coupon_code')){
            $(this).siblings('label').addClass('has-value');
        }
    }).blur(function() {
        var text_val = $(this).val();
        if(text_val === "") {
            $(this).parent().siblings('label').removeClass('has-value');

            if($(this).is('#coupon_code')){
                $(this).siblings('label').removeClass('has-value');
            }
        }
    });

    $(".woocommerce-shipping-fields").click(function(){
        if($("#ship-to-different-address-checkbox").is(':checked')){
            $(".nbd-checkout__cart-items").css("max-height", "679px");
        } else {
            $(".nbd-checkout__cart-items").css("max-height", "377px");
        }
    });
});