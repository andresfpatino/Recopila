jQuery(document).ready(function ($) {

    // Fix on change tab actividades realizadas 
    $(window).resize(function(){
        const swiper = new Swiper('#bblock .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 10,
            navigation: {
                prevEl: '.elementor-swiper-button-prev',
                nextEl: '.elementor-swiper-button-next',
            },
            breakpoints: { // when window width is >=
                375: {
                    slidesPerView: 1
                },
                425: {
                    slidesPerView: 2
                },
                640: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 4
                }
            }
        });

    });

    // Slide sticky post widget blog
    const swiperBlog = new Swiper('.RCPLA__sticky-posts', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        breakpoints: { // when window width is >=
            767: {
                slidesPerView: 1
            }
        }
    });

    // Close mega menu
    $(document).on( 'click', '.RCPLA__close-popup', function( event ) {
		elementorProFrontend.modules.popup.closePopup( {}, event );
	} );

    // Disable first option form
    $(".RCPLA__contact select option:first").attr("disabled", "true");


    // Slide jornadas
    $('.RCPLA__slide-jornadas .elementor-top-section').addClass('swiper-container')
    $('.RCPLA__slide-jornadas .elementor-container ').addClass('swiper-wrapper')
    $('.RCPLA__slide-jornadas .elementor-column').addClass('swiper-slide')
    const swiperJornadas = new Swiper('.RCPLA__slide-jornadas .swiper-container', {
        slidesPerView: 2,
        navigation: {
            prevEl: '.RCPLA__button.prev',
            nextEl: '.RCPLA__button.next',
        }
    });

});
