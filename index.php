<?php get_header();?>

<main class="no-bad-days-club nbd-blog">
    <section class="nbdc-section">
        <header>
            <h1>Blog</h1>
        </header>
        <ul class="nbd-four-column">
            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                <li class="nbd-blog__article">
                    <a href="<?php the_permalink();?>">
                        <?php if(has_post_thumbnail()):?>
                            <img src="<?php the_post_thumbnail_url('post_image');?>" alt="<?php the_title();?>"/> 
                        <?php endif;?>

                        <h2><?php the_title();?></h2>
                    </a>
                </li>
            <?php endwhile; else: endif;?>
        </ul>
    </section>
</main>

<?php get_footer();?>