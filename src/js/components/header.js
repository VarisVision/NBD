jQuery(document).ready(function($){
    const mobileNavSettings = {
        slideFrom: 'top',
        enableEscapeKey: true,
        showScreen: true,
        screenZindex: '9',
        width: '350px',
    }

    const mobileNav = $('#nbd-header__mobile--menu').SlideOutPanel( mobileNavSettings );

    $(".nbd-header__mobile--btn").on('click', function() {
        mobileNav.toggle();
    });



    const sideCartSettings = {
        slideFrom: 'right',
        enableEscapeKey: true,
        width: '350px',
    }
    
    const sideCart = $('#nbd-side-cart__drawer').SlideOutPanel( sideCartSettings );

    $(".nbd-side-cart").on("click", function() {
        sideCart.open();
    });
})