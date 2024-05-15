<div id="nbdc-header__mobile--menu" class="nbdc-header__mobile--menu">
    <section>
        <ul class="nbdc-header__mobile--page-settings">
            <li>
                <?php do_action('wpml_add_language_selector'); ?>
            </li>
            <li>
                <?php do_action('wcml_currency_switcher', array('format' => '%name% (%symbol%)')); ?>
            </li>
        </ul>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-nav-mobile',
                'container' => 'nav',
                'container_class' => 'nbdc-header__mobile--nav',
            )
        );
        ?>

    </section>
</div>