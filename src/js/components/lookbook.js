jQuery(document).ready(function($){
    $('.nbd-lookbook__grid').masonry({
        itemSelector: '.nbd-lookbook__grid-item',
        percentPosition: true,
        columnWidth: '.nbd-lookbook__grid-item',
        gutter: 14
    });
});