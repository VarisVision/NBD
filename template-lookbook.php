<?php 

/* 
Template Name: Lookbook Page
*/

get_header();

?>
<main class="nbd-lookbook">
    <?php 
    $content = get_the_content();
    echo $content;
    ?>
</main>
<?php
get_footer();?>