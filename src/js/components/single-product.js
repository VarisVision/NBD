jQuery(document).ready(function($){

    const singleProductSlider = $('.nbd-single-product__slider');

    singleProductSlider.each(function(){
        $(this).slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: $(this).parent().find(".nbd-carousel__arrow-left"),
            nextArrow: $(this).parent().find(".nbd-carousel__arrow-right")
        });
    });



    $(".nbd-single-product__variations ul li").click(function() {
        var selectedSize = $(this).find('span').data('nbd-value');
        $("#pa_size").val(selectedSize).change();
        
        if($(this).find("div").hasClass("active")){
            $(this).find("div").removeClass("active");
            $('.reset_variations').trigger('click');
            $(".single_add_to_cart_button").text("Select a size")
        } else {
            $(this).parent().find("div").removeClass("active");
            $(this).find("div").addClass("active");
            $(".single_add_to_cart_button").text("Add to cart")
        }


    });

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

});