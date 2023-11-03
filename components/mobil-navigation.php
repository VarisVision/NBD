<div class="nbd-header__mobile">
    <button class="nbd-header__mobile--btn">
        <svg width="23" height="23">
            <use href="#menu-hamburger"></use>
        </svg>
    </button>
    <div id="nbd-header__mobile--menu">
        <section>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-nav-mobile',
                'container' => 'nav',
                'container_class' => 'nbd-header__mobile--nav',
            )
        );
        ?>
        </section>
    </div>
</div>