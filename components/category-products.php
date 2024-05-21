<?php
function categoryProducts($category) {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'product_cat' => $category,
    );

    $products = new WP_Query($args);
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            $product = wc_get_product(get_the_ID());
            $image_url = wp_get_attachment_url($product->get_image_id());
            $thumbnail_url = get_field('product_image_thumbnail', get_the_ID());
            $thumbnail = $thumbnail_url ? $thumbnail_url : $image_url;
            $thumbnail_hover_url = get_field('product_image_on_hover', get_the_ID());
            $thumbnail_hover = $thumbnail_hover_url ? $thumbnail_hover_url : $image_url;

            echo '<div class="nbdc-product-card">';
                if ($image_url) {
                    echo 
                        '<a href="' . get_permalink() . '" class="nbdc-product-card__images">
                                <img src="' . $thumbnail . '" alt="' . get_the_title() . '" />
                                <img src="' . $thumbnail_hover .'" alt="' . get_the_title() . ' in action mood"/>
                        </a>';
                }
                echo 
                    '<div class="nbdc-product-card__info">
                        <a href="' . get_permalink() . '" class="nbdc-product-card__link">
                            <h2>' . get_the_title() . '</h2>'
                            . $product->get_price_html() .
                        '</a>';

                    if (get_post_type() === 'product' && $product = wc_get_product(get_the_ID())) {
                        if ($product->is_type('variable')) {
                            echo '<ul class="nbdc-product-card__quick-add">';
                            $variations = $product->get_available_variations();

                            foreach ($variations as $variation) {
                                echo 
                                    '<li class="nbdc-quick-variation">
                                        <button 
                                            class="add-to-cart-variation"
                                            data-text="' . esc_attr( icl_translate('nbdc_theme', 'Add to cart', 'Add to Cart') ) . '"
                                            data-product-id="' . $product->get_id() . '" 
                                            data-variation-id="' . $variation['variation_id'] . '">
                                            '. wc_attribute_label($variation['attributes']['attribute_pa_size']) . '
                                        </button>   
                                    </li>';
                            }
                            echo '</ul>';
                        }
                    }
            echo '</div></div>';
        }
    }
}
?>