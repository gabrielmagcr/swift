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