<?php include get_template_directory() . './components/head.php';?>

<header class="nbd-header">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'main-nav-left',
            'container' => 'nav',
            'container_class' => 'nbd-header__menu-left',
        )
    );
    ?>
    
    <?php include get_template_directory() . './components/mobil-navigation.php';?>

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
            <a href="">
                <span class="material-symbols-outlined">
                    search
                </span>
            </a>
            <?php include get_template_directory() . './components/side-cart.php';?>
        </nav>
    </div>
</header>