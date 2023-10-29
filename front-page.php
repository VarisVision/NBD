<?php 
require_once('components/category-products.php');
require_once('components/hero-banner.php');
$imageFirst = get_field('first_category_image');

get_header();
?>

<main class="no-bad-days">
    <?php 
        heroBanner($imageFirst['sizes']['large'], $imageFirst['alt']);
    ?>
    <section class="nbd-front-page__section">
        <div class="nbd-four-column-products">
            <?php    
                categoryProducts('t-shirt');
            ?>
        </div>
    </section>

    <section class="nbd-front-page__section">
        <div class="nbd-four-column-products">
            <?php    
                categoryProducts('hoodie');
            ?>
        </div>
    </section>



</main>




<?php
get_footer();
?>