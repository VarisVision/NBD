<?php get_header();?>

<main class="no-bad-days-club">
    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
    <div class="nbdc-page">
        <div class="nbdc-page__content">
            <header>
                <h1><?php the_title();?></h1>
            </header>
            <?php the_content();?>
        </div>
    </div>
</main>

<?php get_footer();?>