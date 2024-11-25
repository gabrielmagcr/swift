document.addEventListener("DOMContentLoaded", () => {
    // Select relevant elements
    const filterGroup = document.querySelectorAll(".filter-group li");
    const productItems = document.querySelectorAll(".product-item");
    const viewMoreButton = document.getElementById("sm-products-view-more");
    const dropdownSelect = document.querySelector(".wil-select");
    const dropdownMenu = document.querySelector(".wil-dropdown-menu");

    // Function: Filter products based on category
    filterGroup.forEach(filter => {
        filter.addEventListener("click", () => {
            const filterValue = filter.getAttribute("data-filter");

            // Highlight the selected filter
            filterGroup.forEach(item => item.classList.remove("active"));
            filter.classList.add("active");

            // Show/Hide products based on the selected filter
            productItems.forEach(item => {
                if (filterValue === ".all" || item.classList.contains(filterValue.substring(1))) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });

    // Function: Show more products when the "View More" button is clicked
    if (viewMoreButton) {
        viewMoreButton.addEventListener("click", () => {
            const hiddenItems = document.querySelectorAll(".product-item.hidden");
            hiddenItems.forEach(item => {
                item.classList.remove("hidden");
                item.style.display = "block";
            });

            // Hide the button if there are no more hidden products
            if (document.querySelectorAll(".product-item.hidden").length === 0) {
                viewMoreButton.style.display = "none";
            }
        });
    }

    // Function: Toggle the dropdown menu
    if (dropdownSelect) {
        dropdownSelect.addEventListener("click", () => {
            dropdownMenu.classList.toggle("open");
        });

        // Close the dropdown menu if clicking outside of it
        document.addEventListener("click", (e) => {
            if (!dropdownSelect.contains(e.target)) {
                dropdownMenu.classList.remove("open");
            }
        });
    }
});
