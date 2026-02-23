import 'bootstrap';

document.addEventListener("DOMContentLoaded", function () {

    const sidebarToggle = document.getElementById("sidebarToggle")
    const sidebarToggleTop = document.getElementById("sidebarToggleTop")
    const wrapper = document.getElementById("wrapper")

    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", function () {
            wrapper.classList.toggle("sidebar-toggled")
        })
    }

    if (sidebarToggleTop) {
        sidebarToggleTop.addEventListener("click", function () {
            wrapper.classList.toggle("sidebar-toggled")
        })
    }

})
