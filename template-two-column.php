<?php 

/* 
Template Name: Two Column Template
*/

require_once('components/hero-banner.php');
require_once('components/basic-img.php');
$bannerImage = get_field('banner_image');
$bannerText = get_field('banner_text');
$firstSectionTitle = get_field('first_section_title');
$firstSectionText = get_field('first_section_text');
$firstSectionImg = get_field('first_section_image');

$secondSectionTitle = get_field('second_section_title');
$secondSectionText = get_field('second_section_text');
$secondSectionImg = get_field('second_section_image');

get_header();

?>
<main class="nbdc-two-column">
    <?php 
        heroBanner($bannerImage, $bannerText);
    ?>
    <section class="nbdc-two-column__row">
        <div class="nbdc-two-column__col">
            <div class="nbdc-two-column__content">
                <div class="nbdc-two-column__text">
                    <h2><?php echo $firstSectionTitle ?></h2>
                    <?php echo $firstSectionText ?>
                </div>
            </div>
        </div>
        <div class="nbdc-two-column__col">
            <div class="nbdc-two-column__image">
                <?php basicImage($firstSectionImg); ?>
            </div>
        </div>
    </section>

    <section class="nbdc-two-column__row revert">
        <div class="nbdc-two-column__col">
            <div class="nbdc-two-column__image">
                <?php basicImage($secondSectionImg); ?>
            </div>
        </div>
        <div class="nbdc-two-column__col">
            <div class="nbdc-two-column__content">
                <div class="nbdc-two-column__text">
                    <h2><?php echo $secondSectionTitle ?></h2>
                    <?php echo $secondSectionText ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();?>