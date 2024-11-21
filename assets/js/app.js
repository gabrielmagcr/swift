import './_tabbed_carousel';
import './_product_carousel';
// import 'bootstrap';

// jQuery(window).load(function($) {
    
// });
jQuery(document).ready(function($) {

      // Search filter functions for recipes
      var qsRegex;

      let $grid = $('.grid').isotope({
        // options
        itemSelector: '.grid-item',
        filter: function() {
            return qsRegex ? $(this).text().match( qsRegex ) : true;
        }
        // layoutMode: 'fitRows'
      });

      $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
      });

      let $prodgrid = $('.iso').isotope({
        // options
        itemSelector: '.product-item',
        // layoutMode: 'masonry'
        layoutMode: 'fitRows'
      });

      // use value of search field to filter
        var $quicksearch = $('.quicksearch').keyup( debounce( function() {
            qsRegex = new RegExp( $quicksearch.val(), 'gi' );
            $grid.isotope();
        }, 200 ) );
        
        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
            clearTimeout( timeout );
            var args = arguments;
            var _this = this;
            function delayed() {
                fn.apply( _this, args );
            }
            timeout = setTimeout( delayed, threshold );
            };
        }

    $('.gn-item').click(function(e) {
        if($(this).hasClass('left-target')) {
            $("#game-target").addClass('target-left')
        } else {
            $("#game-target").removeClass('target-left')
        }
        $('.gn-open').css('display', 'none').removeClass('gn-open');
        $('.active').removeClass('active');
        var item = $(this).data('target');
        $(this).addClass('active');
        $(item).css('display', 'flex').addClass('gn-open');
        e.preventDefault();
        if (document.documentElement.clientWidth < 800) {
            var target = $('#game-target')
            $('html, body').animate({
                scrollTop: target.offset().top
              }, 1000);
        }
    });

    $('#timeline-ul li').hover(function() {
        if($(this).hasClass('tl-left')) {
            var target = $("#tl-target-left");
            var target2 = $("#tl-target-right");
        } else {
            var target = $("#tl-target-right");
            var target2 = $("#tl-target-left");
        }

        var image = $(this).data('image');
        var content = $(this).data('content');
        $(target2).stop().html("").fadeOut('normal');
        $(target).stop().html('<img src="' + image + '" alt="Timeline"><p>' + content + '</p>').fadeIn('normal');
    }, function() {
        $('.tl-target').stop().html("").fadeOut('normal');
    });

      $( ".action-item" ).hover(
        function() {
          if($(this).hasClass('open')) {
              return
          } else {
              $('.open').removeClass('open')
              $(this).addClass('open');
          };
        }
      );


    //   $( ".path-item" ).hover(
    //     function() {
    //         $('.path-item .filled').removeClass('filled')
    //         $( this ).addClass('filled');
          
    //     }, function() {
    //         $( this ).removeClass('filled');
    //     }
    //   );

    //   $('.path-item').click(function() {
    //       $('.filled2').removeClass('filled2')
    //       $('.filled1').removeClass('filled1')
    //       $('.path-item .filled').removeClass('filled');
    //       $(this).addClass('filled2');
    //       let target = $(this).data('target');
    //       $('.cuts-shown').removeClass('cuts-shown')
    //       $(target).addClass('cuts-shown');
    //   });


    document.querySelectorAll('.mmc-gn-item').forEach(button => {
        const target = button.getAttribute('data-target');
        const targetEls = document.querySelectorAll(target);
        console.log(button, target, targetEls);
        if(!targetEls.length) return;

        const toggle = (event) => {
            console.log('toggling');
            document.querySelectorAll('.mmc-gn-item.active').forEach(content => content.classList.remove('active'));
            document.querySelectorAll('.gn-open').forEach(content => content.classList.remove('gn-open'));
            button.classList.add('active');
            targetEls.forEach(el => el.classList.add('gn-open'));
        }

        button.addEventListener('click', toggle)
    })

    document.querySelectorAll('.mmc-recipe-tabs > a').forEach(button => {
        const target = button.getAttribute('data-target');
        const targetEls = document.querySelectorAll(target);
        console.log(button, target, targetEls);
        if(!targetEls.length) return;

        const toggle = (event) => {
            console.log('toggling');
            event.preventDefault();
            document.querySelectorAll('.mmc-recipe-tabs a.active').forEach(content => content.classList.remove('active'));
            document.querySelectorAll('.mmc-recipe-tabs-content.active').forEach(content => content.classList.remove('active'));
            button.classList.add('active');
            targetEls.forEach(el => el.classList.add('active'));
        }

        button.addEventListener('click', toggle)
    })

    //   $( ".cow-path-item" ).hover(
    //     function() {
    //     if($(this).hasClass('shank')) {
    //         $('.shank').addClass('filled1');
    //     } else {
    //         $( this ).addClass('filled1');
    //     }
          
    //     }, function() {
    //         $( this ).removeClass('filled1');
    //         $('.shank').removeClass('filled1');
    //     }
    //   );

    //   $('.cow-path-item').click(function() {
    //         $('.filled').removeClass('filled');
    //       if($(this).hasClass('shank')) {
    //         $('.shank').addClass('filled');
    //       } else {
    //         $(this).addClass('filled');
    //       }
    //       let target = $(this).data('target');
    //       $('.cuts-shown').removeClass('cuts-shown')
    //       $(target).addClass('cuts-shown');
    //   });
    


    let resetgrid = function() {
        $prodgrid.isotope({
            // options
            itemSelector: '.product-item',
            layoutMode: 'fitRows'
            });
    }

    let resetgridm = function() {
        $prodgrid.isotope({
            // options
            itemSelector: '.product-item',
            layoutMode: 'masonry'
            });
    }
/*
    $('.pi-top').click(function(e) {
        if($(this).hasClass('active')) {
            $(this).removeClass('active')
            $(this).next().removeClass('open')
            setTimeout(resetgrid, 400);
            
        } else {
            $('.active').removeClass('active')
            $('.open').removeClass('open')
            $(this).addClass('active')
            $(this).next().addClass('open')
            resetgridm();
            // setTimeout(resetgridm, 200);
            
        }
        e.preventDefault();
    })
*/
    $('.locations-dd li').click(function() {
        let $img = $(this).data('image')
        $('#locator-map img').attr('src', $img);
    });

 
   
    $('#conveyor-wrap').flickity({
        // options
        draggable: true,
        freeScroll: true,
        wrapAround: true,
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        // autoPlay: true
      });
    

    $('.conveyor-products .has-stuff').click(function() {
        let target = $(this).data('target');
        var newtarget = $('#conveyor-content')
        $('.conveyor-item.show').removeClass('show')
        $(target).addClass('show');
        $('html, body').animate({
            scrollTop: newtarget.offset().top
            }, 800);
    });

    $('body').on('shown.bs.modal', '.butcher-modal', function () {
        var video = $('#butcher-vid-modal video');
        $(video).trigger('play');
        });

    $('body').on('hidden.bs.modal', '.butcher-modal', function () {
        var video = $('#butcher-vid-modal video');
        $(video).trigger('pause');
        });

    $('body').on('shown.bs.modal', '.cook-modal', function () {
        var video = $('#cook-vid-modal video');
        $(video).trigger('play');
        });


    $('body').on('hidden.bs.modal', '.cook-modal', function () {
        var video = $('#cook-vid-modal video');
        $(video).trigger('pause');
    });

    const cachedTitle = document.title;
    let modalHistory = 0;

    // Reset tips & recipes url when modal closed
    $('body').on('hidden.bs.modal', '.tips-modal', function () {
        var video = $('.tips-modal video');
        if(video) {
            $(video).trigger('pause');
        }
        
        if(modalHistory > 0 && !window.activeTip) {
            history.go(-1);
            modalHistory--;
        } else if(window.activeTip) {
            history.replaceState({ activeTip: null}, cachedTitle, '/tips-recipes');
        }
        // document.title = 'Tips & Recipes - Swift'
    });

    // Update url when Tip opened on main tips page
    $('body').on('shown.bs.modal', '.tips-modal', function () {
        history.pushState({ activeTip: $(this).data('id') }, $(this).data('title') + ' - Swift', '/tips-recipes/' + $(this).data('path'))
        document.title = $(this).data('title') + ' - Swift';
        modalHistory++;
    });

    // Update url when Tip opened on masterclass page
    // $('body.page-id-32').on('shown.bs.modal', '.tips-modal', function () {
    //     if (window.location.pathname == '/meat-masterclass/tips' || window.location.pathname == '/meat-masterclass/tips/') {
    //         history.pushState({ activeTip: $(this).data('id') }, $(this).data('title') + ' - Swift', '/meat-masterclass/tips?tip=' + $(this).data('id'))
    //         document.title = $(this).data('title') + ' - Swift'
    //     }
    // });

    // Trigger tip modal if js var set from template.
    if (window.activeTip) {
        $('#tip-' + window.activeTip).modal('show')
        history.replaceState({ activeTip: window.activeTip }, cachedTitle)
    }

    // Update url when Ticket opened on tailgate page
    $('body.page-id-1522').on('shown.bs.modal', '.tws-modal', function () {
        if (window.location.pathname == '/tailgate-with-swift' || window.location.pathname == '/tailgate-with-swift/') {
            history.pushState({ activeTip: $(this).data('id') }, $(this).data('title') + ' - Swift', '/tailgate-with-swift?ticket=' + $(this).data('id'))
            document.title = $(this).data('title') + ' - Swift'
        }
    });

    // Trigger tip modal if js var set from template.
    
    if (window.activeTicket) {
        console.log('opening modal', window.activeTicket);
        $('#ticket-' + window.activeTicket).modal('show')
        history.replaceState({ activeTicket: window.activeTicket }, cachedTitle)
    }

    // Handle back/forward buttons on Tips page
    window.onpopstate = function (event) {
        if (event.state && event.state.activeTip) $('#tip-' + event.state.activeTip).modal('show')
        if (event.state && event.state.activeTicket) $('#ticket-' + event.state.activeTicket).modal('show')
        modalHistory = 0;
    }

    $('.variation-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });

    $('.sections-carousel').flickity({
        // options
        //cellAlign: 'left',
        cellSelector: '.sections-cell',
        //draggable: '>1',
        freeScroll: false,
        contain: true,
        prevNextButtons: Array.from(document.querySelectorAll('.sections-cell')).length > 1,
        pageDots: Array.from(document.querySelectorAll('.sections-cell')).length > 1
      });

      $('.roundtable-carousel').flickity({
        // options
        //cellAlign: 'left',
        cellSelector: '.roundtable-cell',
        //draggable: '>1',
        freeScroll: false,
        contain: true,
        prevNextButtons: Array.from(document.querySelectorAll('.roundtable-cell')).length > 1,
        pageDots: Array.from(document.querySelectorAll('.roundtable-cell')).length > 1
      });

    $("#sustain-trigger").click(function() {
        var video = $('#sustain-hero video');
        $(video).trigger('play');
        // $(this).hide()
    })

    $("#sustain-hero video").bind('play', function(e) {
        $('#sustain-trigger').hide()
    });

    $("#sustain-hero video").bind('pause', function(e) {
        $('#sustain-trigger').show()
    });

    $("#sustain-hero video").bind('stop', function(e) {
        $('#sustain-trigger').show()
    });

    var $child = $( ".first-item" )
    var $target = $($child).data('target')
    $($target).addClass('open')

    $('.single-how-to-cook .gn-item').click(function() {
        var $newtarget = $(this).data('target')
        $('.gn-item .active').removeClass('active')
        $(this).addClass('active')
        $('.open').removeClass('open')
        $($newtarget).addClass('open')
    })

    $('.share-trigger').click(function() {
        let parent = $(this).parent()
        let sharebox = $(this).parents().next('.tip-share')
        $(parent).hide()
        $(sharebox).show()
    })

    $('.tip-share-close').click(function() {
        let parent = $(this).parent()
        let headline = $(this).parents().prev('.tip-headline')
        $(parent).hide()
        $(headline).show()
    })

    $('.share-twitter-link').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Twitter", "height=285,width=550,resizable=1");
      });
      $('.share-fb-link').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Facebook", "height=269,width=550,resizable=1");
      });
      $('.share-pin-link').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Facebook", "height=269,width=550,resizable=1");
      });



    document.querySelectorAll('.swift--chopped').forEach(el => {
        const close = el.querySelector('[data-close]');
        close.addEventListener('click', e => {
            e.preventDefault();
            el.remove();
        })
    });



    document.querySelectorAll('.gustavus-wrapper').forEach(wrapper => {
        const FRAME_DURATION = 200;
        const INTERSECTION_THRESHOLD = 0.66;
        
        let frame = 1;
        const images = wrapper.querySelectorAll('img.desktop');
        images[frame - 1].style.opacity = 1;
        
        let interval = null;
        let started = false;

        const stopAnimation = () => clearInterval(interval);

        const startAnimation = () => {
            if(started) return;

            started = true;
            interval = setInterval(() => {
                const currentFrame = frame;
                
                if (frame == images.length) {
                    // Only play animation once
                    return stopAnimation();
                } else {
                    // Increment frame
                    frame += 1;
                } 

                // Hide current frame
                images[currentFrame - 1].style.opacity = 0;
                // Show new frame
                images[frame - 1].style.opacity = 1;
            }, FRAME_DURATION);
        }

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if(!entry.isIntersecting) return;
                console.log('Triggering Gustavus');
                startAnimation();
            });
        }, {
            rootMargin: '0px',
            threshold: INTERSECTION_THRESHOLD,
        });

        observer.observe(wrapper)
    });


    document.querySelectorAll('.gustavus-wrapper').forEach(wrapper => {
        const FRAME_DURATION = 250;
        const INTERSECTION_THRESHOLD = 0.66;
        
        let frame = 1;
        const images = wrapper.querySelectorAll('img.mobile');
        images[frame - 1].style.opacity = 1;
        
        let interval = null;
        let started = false;

        const stopAnimation = () => clearInterval(interval);

        const startAnimation = () => {
            if(started) return;

            started = true;
            interval = setInterval(() => {
                const currentFrame = frame;
                console.log('current frame', frame);
                
                if (frame == images.length) {
                    // Only play animation once
                    return stopAnimation();
                } else {
                    // Increment frame
                    frame += 1;
                } 

                // Hide current frame
                images[currentFrame - 1].style.opacity = 0;
                // Show new frame
                images[frame - 1].style.opacity = 1;
            }, FRAME_DURATION);
        }

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if(!entry.isIntersecting) return;
                console.log('Triggering Gustavus');
                startAnimation();
            });
        }, {
            rootMargin: '0px',
            threshold: INTERSECTION_THRESHOLD,
        });

        observer.observe(wrapper)
    });

 

 
  
  
  });
