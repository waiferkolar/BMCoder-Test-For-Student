var my_toggle_menu = document.querySelector(".my_toggle_menu");
var my_sidebar = document.querySelector(".my_sidebar");

my_toggle_menu.addEventListener("click", () => {
    my_toggle_menu.classList.toggle("fa-arrow-left")
    my_sidebar.classList.toggle("my_sidebar_show")
})