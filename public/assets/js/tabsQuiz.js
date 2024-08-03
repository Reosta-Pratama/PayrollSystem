document.addEventListener("DOMContentLoaded", function() {
    const formKuis = document.getElementById("formKuis");
    const formPertanyaan = document.getElementById("formPertanyaan");
    const btnKuis = document.querySelector(".btnKuis");
    const btnPertanyaan = document.querySelector(".btnPertanyaan");

    const toggleForm = (activeForm, inactiveForm) => {
        activeForm.classList.add('active');
        activeForm.classList.remove('inactive');

        inactiveForm.classList.remove('active');
        inactiveForm.classList.add('inactive');
    };

    document.querySelector(".btnKuis").addEventListener("click", function() {
        sessionStorage.setItem("activeForm", "formKuis");
        toggleForm(formKuis, formPertanyaan);
        toggleForm(btnKuis, btnPertanyaan);
    });

    document.querySelector(".btnPertanyaan").addEventListener("click", function() {
        sessionStorage.setItem("activeForm", "formPertanyaan");
        toggleForm(formPertanyaan, formKuis);
        toggleForm(btnPertanyaan, btnKuis);
    });

    // Set form active based on sessionStorage on page load
    const activeForm = sessionStorage.getItem("activeForm");
    if (activeForm === "formPertanyaan") {
        toggleForm(formPertanyaan, formKuis);
        toggleForm(btnPertanyaan, btnKuis);
    } else {
        toggleForm(formKuis, formPertanyaan);
        toggleForm(btnKuis, btnPertanyaan);
    }
});
