window.addEventListener("beforeunload", function() {
    sessionStorage.removeItem("activeForm");
});