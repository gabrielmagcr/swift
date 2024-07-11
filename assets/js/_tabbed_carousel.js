
import Vue from 'vue';

jQuery(document).ready(function ($) {

    document.querySelectorAll('.block-activation-category-carousel').forEach(el => {
        const carousel = el.querySelector('.tabbed-carousel');
        
        const app = new Vue({
            el,
            data() {
                return {
                    activeIndex: '1',
                    activeTerm: null,
                    totalTabs: 0,
                    loading: true,
                    timeout: null,
                    activeDropdown: null,
                }
            },
            methods: {
                selectTab(index) {
                    this.activeIndex = index;
                    const link = this.$el.querySelector('[data-index="'+index+'"]');
                    const tab = this.$el.querySelector('[data-tab-index="'+index+'"]');
                    const term = link.getAttribute('data-taxonomy-id');
                    // console.log('selecting', index, term);
                    document.querySelectorAll('[data-activation]').forEach(activation => {
                        const terms = activation.getAttribute('data-activation').split(',');
                        // console.log('activation', activation, terms);
                        if(!term || terms.includes(term)) {
                            activation.classList.remove('hidden');
                        } else {
                            activation.classList.add('hidden')
                        }
                    });

                    if(this.timeout) clearTimeout(this.timeout);
                    this.timeout = setTimeout(() => {
                        document.querySelectorAll('[data-tab-index]').forEach(t => {
                            if(t == tab) t.classList.add('active');
                            else t.classList.remove('active');
                        });
                        this.hideDropdownMenu();
                    }, 10);
                },
                nextTab() {
                    const ix = Number(this.activeIndex);
                    if(ix >= this.totalTabs) this.selectTab('1');
                    else this.selectTab((ix+1).toString());
                },
                prevTab() {
                    const ix = Number(this.activeIndex);
                    if (ix == 1) this.selectTab(this.totalTabs.toString());
                    else this.selectTab((ix - 1).toString());
                },
                hideDropdownMenu() {
                    if(this.activeDropdown) {
                        console.log('hiding', $(this.activeDropdown));
                        $(this.activeDropdown).dropdown('hide');
                    }
                },
                mountDropdown() {
                    this.$el.querySelectorAll('.dropdown').forEach(dropdown => {
                        this.activeDropdown = dropdown;
                        $(dropdown).dropdown();

                        $(document).click(function(e) {
                            // get the clicked element
                            let $clicked = $(e.currentTarget);
                            console.log('clicked', $clicked);
                            // if the clicked element is not a descendent of the dropdown
                            if ($clicked.closest('.dropdown').length === 0) {
                              // close the dropdown
                              console.log('closing');
                              $(dropdown).dropdown('hide');
                            }
                        });
                    });
                    
                }
            },
            mounted() {
                this.totalTabs = this.$el.querySelectorAll('.tabbed-carousel--tab').length;

                this.$nextTick(() => {
                    const carousel = this.$el.querySelector('.tabbed-carousel');
                    this.activeIndex = carousel.getAttribute('data-default-index');
                    const defaultTermLink = this.$el.querySelector('[data-index="' + this.activeIndex + '"]');
                    this.activeTerm = defaultTermLink.getAttribute('data-taxonomy-id');
                    this.selectTab(this.activeIndex, this.activeTerm);
                    this.mountDropdown();
                    this.loading = false;
                });
            }
        });
    });
});