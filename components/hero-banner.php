<?php
function heroBanner($imageData, $imageText) {
    $desktop = isset($imageData['url']) ? $imageData['url'] : '';

    $altText = isset($imageData['alt']) ? $imageData['alt'] : '';

    echo 
        '<div class="nbdc-hero">
            <picture>
                <img src="'. $desktop .'" loading="lazy" alt="'. $altText .'"/>
            </picture>
            <div class="nbdc-hero__title">
                <h1>'. $imageText .'</h1>
            </div>
            <div class="nbdc-hero__gradient top"></div>
            <div class="nbdc-hero__gradient bottom"></div>
        </div>';
}
?>