    // Select all elements with the class sm-nextlevel-item
    const nextLevelItems = document.querySelectorAll('.sm-nextlevel-item');
    // Select the h3 element inside #product-next-level
    const productNextLevelH3 = document.querySelector('#product-next-level h3');
  
    // Function to add hover classes
    const addHoverClass = (event) => {
      event.target.classList.add('hovered-background');
      const nextLevelBody = event.target.querySelector('.sm-nextlevel-item--body');
      if (nextLevelBody) {
        nextLevelBody.classList.add('hovered-background');
        console.log('#hovered-background');
      }
      if (productNextLevelH3) {
        productNextLevelH3.classList.add('hovered-text');
        productNextLevelH3.classList.remove('default-text');
        console.log('#hovered-text');

      }
    };
  
    // Function to remove hover classes
    const removeHoverClass = (event) => {
      event.target.classList.remove('hovered-background');
      const nextLevelBody = event.target.querySelector('.sm-nextlevel-item--body');
      if (nextLevelBody) {
        nextLevelBody.classList.remove('hovered-background');
      }
      if (productNextLevelH3) {
        productNextLevelH3.classList.remove('hovered-text');
        productNextLevelH3.classList.add('default-text');
      }
    };
  
    // Add event listeners to each element
    nextLevelItems.forEach(item => {
      item.addEventListener('mouseenter', addHoverClass);
      item.addEventListener('mouseleave', removeHoverClass);
    });