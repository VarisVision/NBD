<div id= "nbd-side-cart" class="nbd-side-cart">
    <button class="nbd-side-cart__icon" aria-label="Cart">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
            <use href="#cart"></use>
        </svg>
    </button>
    <div class="nbd-side-cart__count">
    <span class="cart-items-count count">
        <?php
            echo WC()->cart->get_cart_contents_count();
        ?>
        </span>
    </div>
    <div id="nbd-side-cart__drawer" class="">
        <section>
            <h3>Shopping Cart</h3>
            <div class="widget_shopping_cart_content">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </section>
    </div>
</div>