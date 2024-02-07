jQuery(document).ready(function($){
    $('.nbd-lookbook__grid').masonry({
        itemSelector: '.nbd-lookbook__grid-item',
        percentPosition: true,
        columnWidth: '.nbd-lookbook__grid-item',
        gutter: 14
    });

    const images = $(".nbd-lookbook__grid-item img");
    const modal = $(".nbd-lookbook__modal");
    const overlay =$(".nbd-lookbook__overlay");
    const modalImg = $(".nbd-lookbook__modal-img");
    const closeBtn = $(".nbd-lookbook__modal-close");
    let currentIndex = 0;
  
    const prevBtn = $(".btnPrev");
    const nextBtn = $(".btnNext");

    images.each(function(index) {
        $(this).on("click", function() {
            currentIndex = index;
            updateModalContent();
            modal.addClass("show");
            overlay.show();
            $(".nbd-header").css("z-index", "1");
        });
    });

    function updateModalContent() {
        const image = images.eq(currentIndex);
        modalImg.removeClass("show");
        setTimeout(function() {
            modalImg.attr("src", image.attr("src"));
            modalImg.attr("alt", image.attr("alt"));
            modalImg.addClass("show");
        }, 300);
    }

    nextBtn.on("click", function() {
        currentIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;
        updateModalContent();
    });

    prevBtn.on("click", function() {
        currentIndex = currentIndex - 1 < 0 ? images.length - 1 : currentIndex - 1;
        updateModalContent();
    });

    closeBtn.on("click", function() {
        modal.removeClass("show");
        $(".nbd-header").css("z-index", "9999");
    });

    overlay.on("click", function() {
        modal.removeClass("show");
        $(".nbd-header").css("z-index", "9999");
    })


    var originalWidth = modalImg.width; // Original width of the image
    var originalHeight = modalImg.height; // Original height of the image

    // Function to adjust the image width based on the screen height
    function adjustImageWidthToScreenHeight() {
        var screenHeight = $(window).height(); // Get the screen height
        var aspectRatio = originalWidth / originalHeight; // Calculate the aspect ratio
        var newWidth = screenHeight * aspectRatio; // Calculate the new width based on the screen height
        
        $('#dynamicWidthImage').width(newWidth); // Set the new width
        $('#dynamicWidthImage').css('max-width', 'none'); // Ensure max-width does not interfere
    }

    adjustImageWidthToScreenHeight(); // Adjust on initial load

    // Optionally, adjust the width on window resize
    $(window).resize(function() {
        adjustImageWidthToScreenHeight();
    });
});