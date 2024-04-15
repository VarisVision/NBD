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
                <div id="nav-icon3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
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
                <?php include get_template_directory() . '/components/nav-settings.php';?>
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