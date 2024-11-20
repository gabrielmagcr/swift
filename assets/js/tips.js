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

document.addEventListener("DOMContentLoaded", function() {
    // Filter logic
    const container = document.getElementById('tips-content-wrap');
    const filters = document.querySelectorAll('.r-filter-group li');

    const selectedFilters = {
        protein: '.all',
        method: '.all'
    };

    function applyFilters() {
        const items = container.querySelectorAll('.tips-link');
        items.forEach(function(item) {
            const matchesProtein = selectedFilters.protein === '.all' || item.classList.contains(selectedFilters.protein.slice(1));
            const matchesMethod = selectedFilters.method === '.all' || item.classList.contains(selectedFilters.method.slice(1));

            if (matchesProtein && matchesMethod) {
                item.classList.remove('hidden');
                item.classList.add('showing');
                item.style.display = 'block';
            } else {
                item.classList.remove('showing');
                item.classList.add('hidden');
                setTimeout(function() {
                    item.style.display = 'none';
                }, 300); // Make sure this matches the CSS transition duration
            }
        });

        // Re-initialize lazy load after filtering
        $('.lazy').Lazy();
    }

    filters.forEach(function(filter) {
        filter.addEventListener('click', function() {
            const filterGroup = this.closest('.r-filter-group').dataset.filterGroup;
            const filterValue = this.dataset.filter;

            // Update the active class
            this.parentElement.querySelectorAll('li').forEach(function(li) {
                li.classList.remove('active');
            });
            this.classList.add('active');

            // Update the selected filter for the group
            selectedFilters[filterGroup] = filterValue;

            // Apply filters
            applyFilters();
        });
    });

    // Search logic
    const searchInput = document.getElementById('tip-search');
    searchInput.addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();

        if (searchText === '') {
            // If search is cleared, reapply the filters
            applyFilters();
        } else {
            container.querySelectorAll('.tips-link').forEach(function(item) {
                const title = item.querySelector('.tips-title-wrap span').textContent.toLowerCase();
                const matchesProtein = selectedFilters.protein === '.all' || item.classList.contains(selectedFilters.protein.slice(1));
                const matchesMethod = selectedFilters.method === '.all' || item.classList.contains(selectedFilters.method.slice(1));

                // Display items that match the search text and currently selected filters
                if (title.includes(searchText) && matchesProtein && matchesMethod) {
                    item.classList.remove('hidden');
                    item.classList.add('showing');
                    item.style.display = 'block';
                } else {
                    item.classList.remove('showing');
                    item.classList.add('hidden');
                    setTimeout(function() {
                        item.style.display = 'none';
                    }, 300); // Make sure this matches the CSS transition duration
                }
            });
        }

        // Re-initialize lazy load after search
        $('.lazy').Lazy();
    });
});