function countUp(element, start, end, duration) {
    let current = start;
    const increment = (end - start) / duration;
    const timer = setInterval(function () {
        current += increment;
        if (current >= end) {
            clearInterval(timer);
            current = end;
        }
        element.textContent = current > 999 ? (current / 1000).toFixed(1) + 'K' : Math.round(current);
    }, 1000 / 60); 
}

document
    .querySelectorAll('.count')
    .forEach(function (element) {
        const start = parseInt(element.getAttribute('data-start'));
        const end = parseInt(element.getAttribute('data-end'));
        const duration = parseInt(element.getAttribute('data-duration'));
        countUp(element, start, end, duration);
    });
    