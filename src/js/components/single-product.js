console.log("kokoo");
jQuery(document).ready(function($){

    $('.nbd-single-product__slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});