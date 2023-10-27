<?php 
$imageFirst = get_field('first_category_image');
$pictureFirstSrc = $imageFirst['sizes']['large'];
$pictureFirst = $imageFirst['alt'];

get_header();?>

<main>
    <div class="nbd-hero">
        <picture>
        <img src="<?php echo $pictureFirstSrc ?>" alt="<?php echo $imageFirst['alt'] ?>" />
        </picture>
        <div class="nbd-hero__gradient top"></div>
        <div class="nbd-hero__gradient bottom"></div>
    </div>

    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'product_cat' => 't-shirt',
    );

    $products = new WP_Query($args);
    if ($products->have_posts()) {
        echo '<h2>Products in this category</h2>';
        while ($products->have_posts()) {
            $products->the_post();
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br>';

            // Check if the product has variations
            if (get_post_type() === 'product' && $product = wc_get_product(get_the_ID())) {
                if ($product->is_type('variable')) {
                    echo '<h3>Variations:</h3>';
                    echo '<ul>';

                    // Get variations
                    $variations = $product->get_available_variations();

                    foreach ($variations as $variation) {
                        echo '<li>';
                        echo '<strong>Variation: ' . wc_attribute_label($variation['attributes']['attribute_pa_size']) . '</strong>';
                        echo '<a href="#" class="add-to-cart-variation" data-product-id="' . $product->get_id() . '" data-variation-id="' . $variation['variation_id'] . '">Add to Cart</a>';
                        echo '</li>';
                    }

                    echo '</ul>';
                }
            }
        }
    }

?>

</main>




<?php
get_footer();?>