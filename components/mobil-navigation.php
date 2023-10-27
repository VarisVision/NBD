<div class="nbd-header__mobile">
    <button class="nbd-header__mobile--btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 24 24" fill="none">
            <path d="M4 18L20 18" stroke="#000" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 12L20 12" stroke="#000" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 6L20 6" stroke="#000" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>

    <div id="nbd-header__mobile--menu">
        <section>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-nav-mobile',
            )
        );
        ?>
        </section>
    </div>
</div>