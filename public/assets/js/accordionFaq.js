const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach((item) => {
    const title = item.querySelector('.accordion-title');
    const content = item.querySelector('.accordion-content');
    const tag = title.querySelector('.tag i'); // Mengakses elemen 'i' di dalam 'tag'

    title.addEventListener('click', () => {
        accordionItems.forEach((otherItem) => {
            if (otherItem !== item) {
                otherItem
                    .querySelector('.accordion-content')
                    .classList
                    .remove('active');
                otherItem
                    .querySelector('.tag i')
                    .classList
                    .remove('active-tag');
            }
        });

        content
            .classList
            .toggle('active');

        tag
            .classList
            .toggle('active-tag');
    });
});
