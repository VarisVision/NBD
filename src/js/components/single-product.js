jQuery(document).ready(function($){

    const singleProductSlider = $('.nbdc-single-product__slider');

    singleProductSlider.each(function(){
        $(this).slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: $(this).parent().find(".nbdc-carousel__arrow-left"),
            nextArrow: $(this).parent().find(".nbdc-carousel__arrow-right")
        });
        $('.nbdc-single-product__slide img').each(function() {
            $(this).ezPlus({
                zoomType: 'lens',
                lensShape: 'round',
                lensSize: 100
            });
        });
    });

    $(".nbdc-single-product__variations ul li").click(function() {
        const selectedSize = $(this).find('span').data('nbd-value');
        const addToCartBtn =  $(".nbdc-add-to-cart__button");
        $("#pa_size").val(selectedSize).change();
        
        if($(this).find("div").hasClass("active")){
            $(this).find("div").removeClass("active");
            $('.reset_variations').trigger('click');
            addToCartBtn.text(addToCartTranslation.selectSizeText);
            addToCartBtn.addClass("disabled");
        } else {
            $(this).parent().find("div").removeClass("active");
            $(this).find("div").addClass("active");
            addToCartBtn.text(addToCartTranslation.addToCartText);
            addToCartBtn.removeClass("disabled");
        }
    });

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    setTimeout(function(){
        $('.reset_variations').trigger('click');
    },100  )
});