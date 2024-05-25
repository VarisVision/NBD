<?php 
get_header();
?>
<main class="nbd-lookbook">
    <div id="loader">Loading...</div>
    <div class="nbd-lookbook__grid">
    <?php 
        global $post;    
        $photos_query = get_post_meta( $post->ID, 'gallery_data', true );
        if (is_string($photos_query)) {
            $photos_array = unserialize($photos_query);
        } else {
            $photos_array = $photos_query;
        }
        if (is_array($photos_array) && isset($photos_array['image_url'])) {
            $url_array = $photos_array['image_url'];
            $count = sizeof($url_array);                
            for( $i=0; $i<$count; $i++ ){
                $attachment_id = attachment_url_to_postid($url_array[$i]);

                $mobile = wp_get_attachment_image_url($attachment_id, 'mobile');
                $tablet = wp_get_attachment_image_url($attachment_id, 'tablet');
                $laptop = wp_get_attachment_image_url($attachment_id, 'laptop');
                $desktop = wp_get_attachment_image_url($attachment_id, 'desktop');
                
                $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            ?>
            <div class="nbd-lookbook__grid-item">
                <a href="<?php echo esc_url($desktop); ?>" rel="gallery-1">
                    <picture>
                        <source srcset="<?php echo esc_url($desktop) ?>" media="(min-width: 1440px)"/>
                        <source srcset="<?php echo esc_url($laptop) ?>" media="(min-width: 990px)"/>
                        <source srcset="<?php echo esc_url($tablet) ?>" media="(min-width: 640px)"/>
                        <source srcset="<?php echo esc_url($mobile) ?>" media="(min-width: 0px)"/>
                        <img src="<?php echo esc_url($laptop) ?>" loading="lazy" alt="<?php echo esc_attr($alt_text); ?>"/>
                    </picture>
                </a>
            </div>  
            <?php 
            }
        }
    ?>
    </div>
</main>
<?php
get_footer();
?>