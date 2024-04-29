jQuery(document).ready(function($){
    $('.checkout_coupon_btn').on('click', function(e){
        e.preventDefault();

        let couponCode = $('#coupon_code').val();

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

    $(".nbdc.woocommerce-checkout input, .nbdc.woocommerce-checkout textarea").focus(function() {
        $(this).parent().siblings('label').addClass('has-value');
        if($(this).is('#coupon_code')){
            $(this).siblings('label').addClass('has-value');
        }
    }).blur(function() {
        let text_val = $(this).val();
        if(text_val === "") {
            $(this).parent().siblings('label').removeClass('has-value');

            if($(this).is('#coupon_code')){
                $(this).siblings('label').removeClass('has-value');
            }
        }
    });

    $(".woocommerce-shipping-fields").click(function(){
        if (window.innerWidth >= 992 ) { 
            if($("#ship-to-different-address-checkbox").is(':checked')){
                $(".nbdc-checkout__cart-items").css("max-height", "679px");
            } else {
                $(".nbdc-checkout__cart-items").css("max-height", "377px");
            }
        }
    });

    let formSubmitted = false;
    let fieldsToValidate = {
        'billing_first_name': false, 
        'billing_last_name': false, 
        'billing_address_1': false, 
        'billing_postcode': false, 
        'billing_city': false, 
        'billing_phone': false, 
        'billing_email': false,
        'billing_state': true,
        'billing_country': true
    };

    function isValidEmail(email) {
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validateField(fieldId, isDropdown = false) {
        let field = $('#' + fieldId);
        let value = field.val();
        let errorClass = fieldId + '-error';
        let errorMessage = 'This field is required';

        if(fieldId === 'billing_email' && value && !isValidEmail(value)) {
            errorMessage = 'Invalid billing email address';
        }

        if (isDropdown && value === '' && formSubmitted) {
            errorMessage = 'Please select an option';
        }

        let isFieldInvalid = (isDropdown && value === '' && formSubmitted) ||
        (!isDropdown && !value) ||
        (fieldId === 'billing_email' && !isValidEmail(value));

        if (isFieldInvalid) {
            if($('.' + errorClass).length === 0) {
                field.after('<div class="' + errorClass + '" style="color:red;">' + errorMessage + '</div>');
            }
        } else {
            $('.' + errorClass).remove();
        }
    }

    $('form.checkout').on('checkout_place_order', function(event) {
        let preventSubmission = false;
        formSubmitted = true;

        $.each(fieldsToValidate, function(fieldId, isDropdown) {
            validateField(fieldId, isDropdown);
            if($('.' + fieldId + '-error').length > 0) {
                preventSubmission = true;
            }
        });

        if(preventSubmission) {
            event.preventDefault();
        }
    });

    $.each(fieldsToValidate, function(fieldId, isDropdown) {
        let event = isDropdown ? 'change' : 'input';
        $('#' + fieldId).on(event, function() {
            validateField(fieldId, isDropdown);
        });
    });
});