function toggleAside() {
    const aside = document.querySelector("aside");
    const closeContainerAside = document.getElementById("close-container-aside");

    closeContainerAside.addEventListener("click", function () {
        aside
            .classList
            .add("phone:-left-[100%]");
        
        aside
            .classList
            .add("aside-closed");
        closeContainerAside.classList.add("hidden");
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.getElementById("menu");
    const aside = document.querySelector("aside");
    const closeContainerAside = document.getElementById("close-container-aside");

    toggleAside();

    menuButton.addEventListener("click", function () {
        aside
            .classList
            .toggle("phone:-left-[100%]");
        aside
            .classList
            .toggle("aside-closed");
        closeContainerAside.classList.toggle("hidden");
    });

    window.addEventListener('resize', toggleAside);
});
