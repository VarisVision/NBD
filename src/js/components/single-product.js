console.log("kokoo");
jQuery(document).ready(function($){

    $('.nbd-single-product__slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $(".nbd-single-product__variations ul li").click(function() {
        var selectedSize = $(this).find('span').data('nbd-value');
        $("#pa_size").val(selectedSize).change();
        
        if($(this).find("div").hasClass("active")){
            $(this).find("div").removeClass("active");
            $('.reset_variations').trigger('click');
        } else {
            $(this).parent().find("div").removeClass("active");
            $(this).find("div").addClass("active");
        }


    });

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
});