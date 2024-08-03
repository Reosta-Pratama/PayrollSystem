window.addEventListener('scroll', function () {
    const header = document.getElementById('header')
    const container = document.getElementById('header-container')

    const windowHeight = window.innerHeight
    const scrollPosition = window.scrollY

    const scrollThreshold = windowHeight * 0.5

    if (scrollPosition >= scrollThreshold) {
        header
            .classList
            .add('header-fixed')
        container
            .classList
            .add('fixed-container')

        header
            .classList
            .remove('header-absoulte')
        container
            .classList
            .remove('absoulte-container')
    } else {
        header
            .classList
            .add('header-absoulte')
        container
            .classList
            .add('absoulte-container')

        header
            .classList
            .remove('header-fixed')
        container
            .classList
            .remove('fixed-container')
    }
});