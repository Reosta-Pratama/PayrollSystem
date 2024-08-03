$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 24,
    lazyLoad:true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1.2
        },
        992: {
            items: 1.4
        },
        1200: {
            items: 1.8
        }
    }
})