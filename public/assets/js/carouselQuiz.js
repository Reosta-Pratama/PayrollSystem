$(document).ready(function () {
    const quizCarousel = $('.quiz-carousel');
    const progress = document.getElementById('progress');
    const currentIndex = document.getElementById('currentIndex');
    const totalIndex = document.getElementById('totalIndex');

    quizCarousel.owlCarousel({
        loop: false,
        margin: 15,
        nav: true,
        navText: [
            "sebelumnya", "selanjutnya"
        ],
        navClass: [
            'custom-prev', 'custom-next'
        ],
        dots: false,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1
            }
        },
        onInitialized: updateNavigation,
        onChanged: updateNavigation
    });

    function updateNavigation(event) {
        const items = event.item.count;
        const currentItem = event.item.index + 1;
    
        currentIndex.textContent = currentItem;
        totalIndex.textContent = ` / ${items}`;
    
        if (currentItem === 1) {
            $('.custom-prev').hide();
            $('.custom-next').show();
        } else if (currentItem === items) {
            $('.custom-next').hide();
            $('.custom-prev').show();
            if ($('.custom-modal').length === 0) {
                $('<button id="triggerModal" class="custom-modal" type="submit">selesai</button>').insertAfter('.custom-prev');
            }
        } else {
            $('.custom-next').show();
            $('.custom-prev').show();
            $('.custom-modal').remove();
        }
    
        const widthPercentage = (currentItem / items) * 100;
        progress.style.width = `${widthPercentage}%`;
    }
    

    quizCarousel.on('changed.owl.carousel', function (event) {
        const currentItem = event.item.index + 1;
        currentIndex.textContent = currentItem;
        setProgressWidth(currentItem, quizCarousel.find('.owl-item').length);
    });

    const initialItem = quizCarousel
        .find('.owl-item.active')
        .index() + 1;
    currentIndex.textContent = initialItem;
    setProgressWidth(initialItem, quizCarousel.find('.owl-item').length);
    totalIndex.textContent = ` / ${quizCarousel
        .find('.owl-item')
        .length}`;
});

function setProgressWidth(currentIndex, totalIndex) {
    const widthPercentage = (currentIndex / totalIndex) * 100;
    progress.style.width = `${widthPercentage}%`;
}
