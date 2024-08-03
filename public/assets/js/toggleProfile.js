document.addEventListener('click', function(event) {
    const dropdown = document.getElementById("myDropdown");
    const button = document.getElementById('dropdownProfile');

    if (event.target !== button && !button.contains(event.target) && event.target !== dropdown && !dropdown.contains(event.target)) {
        dropdown.classList.remove('show');
    }
});

function toggleDropdown() {
    const dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("show");
}