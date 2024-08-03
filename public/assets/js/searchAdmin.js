document.addEventListener('DOMContentLoaded', function () {
    const liveSearchInput = document.getElementById('live-search');
    const listItems = document.querySelectorAll('#isi-pencarian li');
    const noDataMessage = document.getElementById('no-data-message');

    liveSearchInput.addEventListener('input', function () {
        const searchText = liveSearchInput
            .value
            .toLowerCase();
        let hasResults = false;

        listItems.forEach(function (item) {
            const itemName = item
                .querySelector('.nav-name')
                .textContent
                .toLowerCase();
            if (itemName.includes(searchText)) {
                item.style.display = 'block';
                hasResults = true;
            } else {
                item.style.display = 'none';
            }
        });

        if (!hasResults) {
            noDataMessage.style.display = 'block';
        } else {
            noDataMessage.style.display = 'none';
        }
    });
});