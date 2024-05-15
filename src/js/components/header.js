jQuery(document).ready(function($){
    const mobileNavSettings = {
        slideFrom: 'top',
        enableEscapeKey: true,
        showScreen: true,
        screenZindex: '9',
        width: '350px',
    }

    const sideCartSettings = {
        slideFrom: 'right',
        enableEscapeKey: true,
        width: '350px',
    }

    const mobileNav = $('#nbdc-header__mobile--menu').SlideOutPanel( mobileNavSettings );
    const sideCart = $('#nbd-side-cart__drawer').SlideOutPanel( sideCartSettings );

    $(".nbdc-header__mobile").on('click', function() {
        mobileNav.toggle();
        $(this).find('#nav-icon3').toggleClass('open');
    });

    $(".nbd-side-cart").on("click", function() {
        sideCart.open();
    });

    $('.nbdc-settings__btn').on('click', function(){
        $('.nbdc-settings__panel').slideToggle();
    });

    $('.nbdc-settings__panel-close').on('click', function(){
        $('.nbdc-settings__panel').slideUp();
    });
})