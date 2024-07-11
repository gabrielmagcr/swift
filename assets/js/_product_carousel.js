
jQuery(document).ready(function($) {

    $('.product-carousel').flickity({
        // options
        cellAlign: 'left',
        cellSelector: '.product-carousel--item',
        freeScroll: false,
        contain: true,
        prevNextButtons: true,
        pageDots: false,
        groupCells: true,
    });

});