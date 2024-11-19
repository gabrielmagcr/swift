const dots = document.querySelectorAll('.pagination-dot');
const navItems = document.querySelectorAll('.mmc-page-nav-item');

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    document.querySelector('.mmc-page-nav').scrollTo({
      left: navItems[index].offsetLeft,
      behavior: 'smooth'
    });

    document.querySelector('.pagination-dot.active').classList.remove('active');
    dot.classList.add('active');
  });
});

