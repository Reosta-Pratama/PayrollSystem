function toggleDisquss() {
    const showOptButtons = document.querySelectorAll('.showOptButton');
    const optContainers = document.querySelectorAll('.optContainer');

    showOptButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            const index = button.dataset.index;
            const optContainer = document.querySelector(`.optContainer[data-index="${index}"]`);

            if (optContainer) {
                if (optContainer.classList.contains('opacity-0') && optContainer.classList.contains('invisible')) {
                    optContainers.forEach((opt) => {
                        opt.classList.add('opacity-0', 'invisible');
                    });

                    optContainer.classList.remove('opacity-0', 'invisible');
                    button.classList.remove('opacity-0');
                } else {
                    optContainer.classList.add('opacity-0', 'invisible');
                    button.classList.add('opacity-0');
                }
            }

            event.stopPropagation(); 
        });
    });

    window.addEventListener('click', function () {
        optContainers.forEach((opt) => {
            opt.classList.add('opacity-0', 'invisible');
        });
    });
}
