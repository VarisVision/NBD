jQuery(document).ready(function($){
    $('#loader').show();
    
    $(window).on("load", function() {
        $('.nbd-lookbook__grid').masonry({
            itemSelector: '.nbd-lookbook__grid-item',
            percentPosition: true,
            columnWidth: '.nbd-lookbook__grid-item',
            gutter: 14
        }).imagesLoaded().always(function() {
            $('#loader').hide();
            $('.nbd-lookbook__grid').css('visibility', 'visible');
            $('.single-gallery .nbdc-footer').show();
        });
    });


    $('.nbd-lookbook__grid-item a').on('openstart.fluidbox', function() {
        $('body').addClass('no-scroll');
        $('.nbdc-header').css('z-index', '999');
    }).on('closeend.fluidbox', function() {
        $('body').removeClass('no-scroll');
        $('.nbdc-header').css('z-index', '9999');
    }).fluidbox({
        maxHeight: 900,
    });
});