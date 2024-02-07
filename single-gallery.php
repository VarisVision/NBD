<?php 
get_header();
?>
<main class="nbd-lookbook">
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
                $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            ?>      
            <div class="nbd-lookbook__grid-item">
                <img src="<?php echo $url_array[$i]; ?>" alt="<?php echo esc_attr($alt_text); ?>"/>
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
<div class="nbd-lookbook__modal">
    <div class="nbd-lookbook__overlay"></div>
    <span class="nbd-lookbook__modal-close">×</span>
    <div class="nbd-lookbook__modal-content">
    <img src="" alt="" class="nbd-lookbook__modal-img">
    <div class="nbd-lookbook__modal-nav">
        <button type="button" class="btnPrev">❮</button>
        <button type="button" class="btnNext">❯</button>
    </div>
    </div>
</div>