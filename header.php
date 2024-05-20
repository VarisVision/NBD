<?php include get_template_directory() . '/components/head.php';?>

<header class="nbdc-header">
    <div class="nbdc-header__container">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-nav-left',
                'container' => 'nav',
                'container_class' => 'nbdc-header__menu-left',
            )
        );
        ?>
        <div class="nbdc-header__mobile">
            <button class="nbdc-header__mobile--btn">
                <div id="nav-icon3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        <div class="nbdc-header__logo">
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
            <div class="nbdc-header__menu-right">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-nav-right',
                        'container' => 'nav',
                    )
                );
            ?>
            <nav class="nbdc-header__menu-right--icons">
                <?php include get_template_directory() . '/components/nav-settings.php';?>
                <?php include get_template_directory() . '/components/side-cart.php';?>
            </nav>
        </div>
    </div>


    <?php include get_template_directory() . '/components/header-mobile.php';?>

</header>