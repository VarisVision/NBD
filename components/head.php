<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>" sizes="16x16" type="image/png">
    <title><?php bloginfo('name');?></title>
    
    <?php wp_head();?>
</head>
<body <?php body_class('nbd');?>>