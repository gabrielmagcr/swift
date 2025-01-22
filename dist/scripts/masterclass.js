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

const resetProductTabs = (wrapper) => {
    const tabsWrapper = wrapper.querySelector('.mmc-product-tabs');
    if(!tabsWrapper) return;
    
    tabsWrapper.querySelectorAll('.mmc-product-tab,.mmc-product-link').forEach(tab => {
        if(tab.getAttribute('data-product-index') == '1') tab.classList.add('active');
        else tab.classList.remove('active');
    })
}

const setupProductTabs = (wrapper) => {
    const tabsWrapper = wrapper.querySelector('.mmc-product-tabs');
    if(!tabsWrapper) return;

    tabsWrapper.querySelectorAll('.mmc-product-link').forEach(link => {

        link.addEventListener('click', e => {
            e.preventDefault();
            const meat = link.getAttribute('data-meat');
            const cut = link.getAttribute('data-cut-number');
            const index = link.getAttribute('data-product-index');
            const tab = tabsWrapper.querySelector(`.mmc-product-tab[data-meat="${meat}"][data-cut-number="${cut}"][data-product-index="${index}"]`);
            
            
            tabsWrapper.querySelectorAll('.mmc-product-link').forEach(l => {
                if(l == link) {
                    l.classList.add('active');
                } else {
                    l.classList.remove('active');
                }
            })

            tabsWrapper.querySelectorAll('.mmc-product-tab').forEach(t => {
                if(t == tab) {
                    t.classList.add('active');
                } else {
                    t.classList.remove('active');
                }
            })

            resetProductTabs();
        })

    })
}

document.querySelectorAll('.path-item[data-target],.cow-path-item[data-target]').forEach(button => {
    const target = button.getAttribute('data-target');
    const targetEl = document.querySelector(target);
    
    if(!targetEl) return;

    const toggle = (event) => {
        event.preventDefault();
        document.querySelectorAll('.path-item.filled,.cow-path-item.filled').forEach(cut => cut.classList.remove('filled'));
        document.querySelectorAll('.cut-item.cuts-shown').forEach(cut => cut.classList.remove('cuts-shown'));
        button.classList.add('filled');
        targetEl.classList.add('cuts-shown');

        resetProductTabs(targetEl);
    }

    setupProductTabs(targetEl);
    resetProductTabs(targetEl);

    button.addEventListener('click', toggle)
})
