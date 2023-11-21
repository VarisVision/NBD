jQuery(document).ready(function($){
    const mobileNavSettings = {
        slideFrom: 'left',
        width: '350px',
    }

    const mobileNav = $('#nbd-header__mobile--menu').SlideOutPanel( mobileNavSettings );

    $(".nbd-header__mobile--btn").on("click", function() {
        mobileNav.open();
    });

    const sideCartSettings = {
        slideFrom: 'right',
        width: '350px',
    }

    const sideCart = $('#nbd-side-cart__drawer').SlideOutPanel( sideCartSettings );

    $(".nbd-side-cart__icon").on("click", function() {
        sideCart.open();
    });
})