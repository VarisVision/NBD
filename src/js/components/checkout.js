jQuery(document).ready(function($){

    $('.nbdc-checkout__coupon-btn').on('click', function (e) {
        e.preventDefault();
        $('#coupon_code').val($(".nbdc-checkout__coupon-input").val());
        $(".woocommerce-form-coupon").trigger('submit');
    });

    function moveWooCommerceMessages() {
        let couponField = $('.nbdc-checkout__coupon');
        let messages = $('.woocommerce-error, .woocommerce-message').not('.wc-ppcp-notice__info .woocommerce-error');
        
        if (couponField.length && messages.length) {
            couponField.find('.custom-messages').html(messages);
        }
    }
    moveWooCommerceMessages();

    $(document).ajaxComplete(function() {
        moveWooCommerceMessages();
    });

    $('form.checkout input').attr('autocomplete', 'off');

    $(".woocommerce-billing-fields__field-wrapper p input, .woocommerce-shipping-fields__field-wrapper p input").each(function(i, e) {
        if(!$(e).val('')) {
            $(this).parent().siblings('label').addClass('has-value');
        }
    })

    $(".nbdc.woocommerce-checkout input").focus(function() {
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