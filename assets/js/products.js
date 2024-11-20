jQuery(document).ready(function($) {

    function viewMore() {
        $('.product-item.hidden').removeClass('hidden');
        $('#sm-products-view-more').remove();
        setTimeout(function() {
            resetgrid();
        }, 50);
    }
    
    
    
    /* view all products button */
    $('#sm-products-view-more').on('click', viewMore);
    
    
    /* accordion / drawer */
    $('button[data-toggle]').on('click', function() {
        var $this = $(this);
        var $target = $('#' + $this.data('toggle'));
        if (!$target) return;
        const open = $target.css('height') !== '0px';
        $target.css({ height: open ? '0px' : 'auto' });
        $this.toggleClass('is-open');
    });
    
    
    $('.wil-dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.wil-dropdown-menu').slideToggle(300);
    });
    $('.wil-dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.wil-dropdown-menu').slideUp(300);
    });
    $('.wil-dropdown .wil-dropdown-menu li').click(function () {
        $(this).parents('.wil-dropdown').find('span').text($(this).text());
        $(this).parents('.wil-dropdown').find('').text($(this).text());
        viewMore();
        // $(this).parents('.wil-dropdown').find('input').attr('value', $(this).attr('id'));
    });
    /*End Dropdown Menu*/
    
    let urlParams = new URLSearchParams(window.location.search)
    if(urlParams.has('filter')) {
        if(urlParams.get('filter') == 'pork') {
            let param = ".Pork"
            filter_from_param(param)
            $('.wil-dropdown #protein-dd li').parents('.wil-dropdown').find('span').text("Pork");
        } else if (urlParams.get('filter')=='beef'){
            let param = ".Beef"
            filter_from_param(param)
            $('.wil-dropdown #protein-dd li').parents('.wil-dropdown').find('span').text("Beef");
        }   else if (urlParams.get('filter')=='bacon') {
            let param = ".Bacon"
            filter_from_param(param)
            $('.wil-dropdown #protein-dd li').parents('.wil-dropdown').find('span').text("Bacon");
        } else if (urlParams.get('filter')=='lamb') {
            let param = ".Lamb"
            filter_from_param(param)
            $('.wil-dropdown #protein-dd li').parents('.wil-dropdown').find('span').text("Lamb");
        }
        
    }
    function filter_from_param(param) {
        let theFilterValue = param
        $grid.isotope({ filter: theFilterValue });
        $('ul#protein-dd')
    }


       // store filter for each group
       var filters = {};

       $('.filter-group').on( 'click', 'li', function() {
       var $this = $(this);
       // get group key
       var $buttonGroup = $this.parents('.filter-group');
       var filterGroup = $buttonGroup.attr('data-filter-group');
       // set filter for group
       filters[ filterGroup ] = $this.attr('data-filter');
       // combine filters
       var filterValue = concatValues( filters );
       $prodgrid.isotope({ filter: filterValue });
       });
   
       // flatten object by concatting values
       function concatValues( obj ) {
       var value = '';
       for ( var prop in obj ) {
           value += obj[ prop ];
       }
       return value;
       }
   
       var rfilters = {};
   
       $('.r-filter-group').on( 'click', 'li', function() {
       var $this = $(this);
       // get group key
       var $buttonGroup = $this.parents('.r-filter-group');
       var filterGroup = $buttonGroup.attr('data-filter-group');
       // set filter for group
       rfilters[ filterGroup ] = $this.attr('data-filter');
       // combine filters
       var filterValue = concatValues( rfilters );
       console.log(filterValue)
       $grid.isotope({ filter: filterValue });
       });
   
       // flatten object by concatting values
       function concatValues( obj ) {
       var value = '';
       for ( var prop in obj ) {
           value += obj[ prop ];
       }
       return value;
       }
       
    })