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