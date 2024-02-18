/*====================================================
Template Name   : Netox
Description     : NFT Marketplace HTML5 Template
Author          : Themesland
Version         : 1.0
=======================================================*/


(function ($) {
    
    "use strict";

    // preloader
    $(window).on('load', function () {
        $(".preloader").fadeOut("slow");
    });

    // multi level dropdown menu
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass('show');
        });
        return false;
    });


    // navbar search 
    $('.search-btn').on('click', function() {
        $('.search-area').toggleClass('open');
    });


    // data-background    
    $(document).on('ready', function () {
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
        });
    });


    // wow init
    new WOW().init();


    // hero slider
    $('.hero-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 0,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        items: 1,
        navText: [
            "<i class='fal fa-angle-left'></i>",
            "<i class='fal fa-angle-right'></i>"
        ],

        onInitialized: function(event) {
        var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
        doAnimations($firstAnimatingElements);
        },

        onChanged: function(event){
        var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
        doAnimations($firstAnimatingElements);
        }
    });

    //hero slider do animations
    function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationDuration = $this.data('duration');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay,
                'animation-duration': $animationDuration,
                '-webkit-animation-duration': $animationDuration,
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}



    // hero-slider 2
    $('.hero-slider2').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });



    // hero-slider 3
    $('.hero-slider3').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: true,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });



    // explore-slider
    $('.explore-slider').owlCarousel({
        loop: true,
        margin: 24,
        nav: true,
        dots: false,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1400: {
                items: 4
            }
        }
    });


    // collection-slider
    $('.collection-slider').owlCarousel({
        loop: true,
        margin: 24,
        nav: true,
        dots: false,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            },
            1400: {
                items: 3
            }
        }
    });


    // top-seller-slider
    $('.top-seller-slider').owlCarousel({
        loop: true,
        margin: 24,
        nav: true,
        dots: false,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            },
            1400: {
                items: 4
            }
        }
    });

    
    // item-single-slider
    $('.item-single-slider').owlCarousel({
        items: 1,
        loop: true,
        center: true,
        margin: 10,
        autoplay: false,
        dots: true,
        dotsContainer: '.owl-dots',
    });

    // owlCarousel thumnail image slide
    $('.thumnail-owl-dots .owl-dots li').click(function () {
        $('.owl-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
    });



    // testimonial-slider
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1400: {
                items: 4
            }
        }
    });


    // instagram-slider
    $('.instagram-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });


    // partner-slider
    $('.partner-slider').owlCarousel({
        loop: true,
        margin: 18,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });


    // fun fact counter
    $('.counter').countTo();
    $('.counter-box').appear(function () {
        $('.counter').countTo();
    }, {
        accY: -100
    });


    // magnific popup init
    $(".popup-gallery").magnificPopup({
        delegate: '.popup-img',
        type: 'image',
        gallery: {
            enabled: true
        },
    });

    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    // scroll to top
    $(window).scroll(function () {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $("#scroll-top").addClass('active');
        } else {
            $("#scroll-top").removeClass('active');
        }
    });

    $("#scroll-top").on('click', function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);
        return false;
    });


    // navbar fixed top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass("fixed-top");
        } else {
            $('.navbar').removeClass("fixed-top");
        }
    });


    // project filter
    $(window).on('load', function () {
        if ($(".filter-box").children().length > 0) {
            $(".filter-box").isotope({
                itemSelector: '.filter-item',
                masonry: {
                    columnWidth: 2
                },
            });

            $('.filter-btn').on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                $(".filter-box").isotope({ filter: filterValue });
            });

            $(".filter-btn li").each(function () {
                $(this).on("click", function () {
                    $(this).siblings("li.active").removeClass("active");
                    $(this).addClass("active");
                });
            });
        }
    });



    // item countdown
    $('[data-countdown]').each(function() {
        let finalDate = $(this).data('countdown');
        $(this).countdown(finalDate, function(event) {
            $(this).html(event.strftime(
                '<div class="time-wrap">' + '<span class="time"><span>%-D</span><span class="unit">Day%!D</span></span>' + ' <span class="divider">:</span> ' + '<span class="time"><span>%H</span><span class="unit">Hour%!H</span></span>' + ' <span class="divider">:</span> ' + '<span class="time"><span>%M</span><span class="unit">Min%!M</span></span>' + ' <span class="divider">:</span> ' + '<span class="time"><span>%S</span><span class="unit">Sec%!S</span></span>' + '</div>'
            ));
        });
    });


    
    // price range slider
	if($(".price-range").length){
        $( ".price-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [100, 200],
            slide: function( event, ui ){$( "#price-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );}
        });
        $( "#price-amount" ).val( "$" + $( ".price-range" ).slider( "values", 0 ) + " - $" + $( ".price-range" ).slider( "values", 1 ) );
    }


    // nice select
    if($('.select').length){
        $('.select').niceSelect();
    }
    

    // copywrite date
    let date = new Date().getFullYear();
    $("#date").html(date);


    
    // file btn
    $(".file-btn").on('click', function (e) {
        $(this).next('.file-input').click();
    });


    // mobile sidebar menu
    $(".menu-bar").on('click', function (e) {
        $('.main-sidebar').addClass('active');
    });

    $(".main-sidebar-close").on('click', function (e) {
        $('.main-sidebar').removeClass('active');
    });


    // copy text
    $('.copy-btn').on('click', function() {
        var copyText = $('.copy-text').select();
        navigator.clipboard.writeText(copyText.text());
		$('.copy-notify').addClass('active');
		setTimeout(function() {
			$('.copy-notify').removeClass('active');
		}, 1200);
	});


    // theme color mode
    const getMode = localStorage.getItem('theme');
    if (getMode === 'dark') {
        $('body').addClass('theme-mode-variables');
        $('.light-btn').css('display','none');
        $('.dark-btn').css('display','block');
    }

    $('.theme-mode-control').on('click',function(){
        $('body').toggleClass('theme-mode-variables')
        const checkMode = $('body').hasClass('theme-mode-variables');
        const setMode = checkMode ? 'dark' : 'light';
        localStorage.setItem('theme', setMode);
        if (checkMode) {
            $('.light-btn').css('display','none');
            $('.dark-btn').css('display','block');
        }else {
            $('.light-btn').css('display','block');
            $('.dark-btn').css('display','none');
        }
    });
    

    // logo color mode
    $(window).on('load', function(){logoMode()});
    $('.theme-mode-control').on('click', function(){logoMode()});
    function logoMode(){
        let dtv=document.querySelector('.theme-mode-variables');
        if(dtv) {
            $('.logo-light-mode').css('display','block');
            $('.logo-dark-mode').css('display','none');
        }else {
            $('.logo-light-mode').css('display','none');
            $('.logo-dark-mode').css('display','block');
        }
    }


})(jQuery);










