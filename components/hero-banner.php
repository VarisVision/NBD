<?php
function heroBanner($src, $alt) {
    echo 
        '<div class="nbd-hero">
            <picture>
                <img src="'.$src .'" alt="'. $alt .'" />
            </picture>
            <div class="nbd-hero__gradient top"></div>
            <div class="nbd-hero__gradient bottom"></div>
        </div>';
}
?>