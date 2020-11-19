//Hide-Button-Menu
document.querySelector(".sidebar-button").addEventListener("click", function() {
    document.querySelector(".sidebar").classList.toggle("hide");
    document.querySelector(".body").classList.toggle("body-expand");
});
