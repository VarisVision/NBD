<?php include get_template_directory() . '/components/head.php';?>

<header>
    <div class="nbd-header">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-nav-left',
                'container' => 'nav',
                'container_class' => 'nbd-header__menu-left',
            )
        );
        ?>
        <div class="nbd-header__mobile">
            <button class="nbd-header__mobile--btn">
                <svg width="23" height="23">
                    <use href="#menu-hamburger"></use>
                </svg>
            </button>
        </div>

        <div class="nbd-header__logo">
            <?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                <a href="/"><img src="<?php echo $image[0]; ?>" alt=""></a>
                <?php else : ?>
                    <a href="/"><h2><?php bloginfo('name');?></h2></a>
            <?php endif; ?>
        </div>
            <div class="nbd-header__menu-right">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-nav-right',
                        'container' => 'nav',
                    )
                );
            ?>
            <nav class="nbd-header__menu-right--icons">
                <button href="" class="nbd-search__btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32" xml:space="preserve">
                        <use href="#search"></use>
                    </svg>
                </button>
                <?php include get_template_directory() . '/components/side-cart.php';?>
            </nav>
        </div>
    </div>
    <div id="nbd-header__mobile--menu" class="nbd-header__mobile--menu">
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
</header>