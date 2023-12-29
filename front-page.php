<?php 
require_once('components/category-products.php');
require_once('components/hero-banner.php');
$imageCategoryFirst = get_field('first_category_image');
$imageCategorySecond = get_field('second_category_image');

get_header();
?>

<main class="no-bad-days">
    <?php 
        heroBanner($imageCategoryFirst);
    ?>

    <section class="nbd-section">
        <div class="nbd-four-column-products">
            <?php    
                categoryProducts('t-shirt');
            ?>
        </div>
    </section>

    <?php 
        heroBanner($imageCategorySecond);
    ?>

    <section class="nbd-section">
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