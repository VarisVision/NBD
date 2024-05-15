<?php 
require_once('components/category-products.php');
require_once('components/hero-banner.php');
$categoryProductFirst = get_field('first_category');
$categoryProductSecond = get_field('second_category');
$imageCategoryFirst = get_field('first_category_image');
$imageCategorySecond = get_field('second_category_image');

get_header();
?>

<main class="no-bad-days-club">
    <?php 
        heroBanner($imageCategoryFirst, '');
    ?>

    <section id="<?php echo $categoryProductFirst;?>" class="nbdc-section">
        <div class="nbdc-four-column">
            <?php    
                categoryProducts($categoryProductFirst);
            ?>
        </div>
    </section>

    <?php 
        heroBanner($imageCategorySecond, '');
    ?>

    <section id="<?php echo $categoryProductSecond;?>" class="nbdc-section">
        <div class="nbdc-four-column">
            <?php    
                categoryProducts($categoryProductSecond);
            ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>