<?php 
require_once('components/front-page-products.php');
$imageFirst = get_field('first_category_image');
$pictureFirstSrc = $imageFirst['sizes']['large'];
$pictureFirst = $imageFirst['alt'];

get_header();?>

<main class="no-bad-days">
    <div class="nbd-hero">
        <picture>
        <img src="<?php echo $pictureFirstSrc ?>" alt="<?php echo $imageFirst['alt'] ?>" />
        </picture>
        <div class="nbd-hero__gradient top"></div>
        <div class="nbd-hero__gradient bottom"></div>
    </div>

    <section class="nbd-front-page__section">
        <div class="nbd-front-page__products">
            <?php    
                frontPageProducts('t-shirt');
            ?>
        </div>
    </section>

    <section class="nbd-front-page__section">
        <div class="nbd-front-page__products">
            <?php    
                frontPageProducts('hoodie');
            ?>
        </div>
    </section>



</main>




<?php
get_footer();?>