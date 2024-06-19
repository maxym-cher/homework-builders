(function( $ ) {
    $( document ).ready( function() {
        $('.testimonials-slider').slick({
            slidesToShow: 1,
            arrows: false,
            dots: true,
            infinite: true,
            speed: 300,
            adaptiveHeight: true
        });
    });
}( jQuery ));