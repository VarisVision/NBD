<?php
function heroBanner($imageData, $imageText) {
    $mobile = isset($imageData['sizes']['mobile']) ? $imageData['sizes']['mobile'] : ''; 
    $tablet = isset($imageData['sizes']['tablet']) ? $imageData['sizes']['tablet'] : ''; 
    $laptop = isset($imageData['sizes']['laptop']) ? $imageData['sizes']['laptop'] : ''; 
    
    $desktop = isset($imageData['url']) ? $imageData['url'] : '';

    $altText = isset($imageData['alt']) ? $imageData['alt'] : '';

    echo 
        '<div class="nbdc-hero">
            <picture>
                <source srcset="'. $desktop .'" media="(min-width: 1440px)"> 
                <source srcset="'. $laptop .'" media="(min-width: 990px)"> 
                <source srcset="'. $tablet .'" media="(min-width: 640px)"> 
                <source srcset="'. $mobile .'" media="(min-width: 0px)"> 
                <img src="'. $laptop .'" loading="lazy" alt="'. $altText .'"/> 
            </picture>
            <div class="nbdc-hero__title">
                <h1>'. $imageText .'</h1>
            </div>
            <div class="nbdc-hero__gradient top"></div>
            <div class="nbdc-hero__gradient bottom"></div>
        </div>';
}
?>