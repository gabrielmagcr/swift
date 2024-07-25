import '../scss/app.scss';
import './_tabbed_carousel';
import './_product_carousel';
// import 'bootstrap';

// jQuery(window).load(function($) {
    
// });
jQuery(document).ready(function($) {
    var qsRegex;

    let $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        filter: function() {
            return qsRegex ? $(this).text().match(qsRegex) : true;
        }
    });

    $grid.imagesLoaded().progress(function() {
        $grid.isotope('layout');
    });

    let $prodgrid = $('.iso').isotope({
        itemSelector: '.product-item',
        layoutMode: 'fitRows'
    });

    var $quicksearch = $('.quicksearch').keyup(debounce(function() {
        qsRegex = new RegExp($quicksearch.val(), 'gi');
        $grid.isotope();
    }, 200));

    function debounce(fn, threshold) {
        var timeout;
        threshold = threshold || 100;
        return function debounced() {
            clearTimeout(timeout);
            var args = arguments;
            var _this = this;
            function delayed() {
                fn.apply(_this, args);
            }
            timeout = setTimeout(delayed, threshold);
        };
    }

    $('.wil-dropdown').click(function() {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.wil-dropdown-menu').slideToggle(300);
    });

    $('.wil-dropdown').focusout(function() {
        $(this).removeClass('active');
        $(this).find('.wil-dropdown-menu').slideUp(300);
    });

    $('.wil-dropdown .wil-dropdown-menu li').click(function() {
        $(this).parents('.wil-dropdown').find('span').text($(this).text());
        $(this).parents('.wil-dropdown').find('a').text($(this).text());
        viewMore();
    });

    var filters = {};

    $('.filter-group').on('click', 'li', function() {
        var $this = $(this);
        var $buttonGroup = $this.parents('.filter-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        filters[filterGroup] = $this.attr('data-filter');
        var filterValue = concatValues(filters);
        $prodgrid.isotope({ filter: filterValue });
    });

    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[prop];
        }
        return value;
    }

    var rfilters = {};

    $('.r-filter-group').on('click', 'li', function() {
        var $this = $(this);
        var $buttonGroup = $this.parents('.r-filter-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        rfilters[filterGroup] = $this.attr('data-filter');
        var filterValue = concatValues(rfilters);
        $grid.isotope({ filter: filterValue });
    });

    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[prop];
        }
        return value;
    }

    function viewMore() {
        $('.view-all').click(function() {
            $('.recipes').addClass('visible').fadeIn(400);
            $('.category').addClass('is-active').siblings().removeClass('is-active');
        });
    }
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('filter')) {
        let param = '.' + urlParams.get('filter');
        filter_from_param(param);
        $('.wil-dropdown #protein-dd li').parents('.wil-dropdown').find('span').text(param.replace('.', ''));
    }

    function filter_from_param(param) {
        let theFilterValue = param;
        $prodgrid.isotope({ filter: theFilterValue });
    }
});