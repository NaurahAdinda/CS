function setActiveNavbar() {
    var links = document.querySelectorAll(".nav-link");
    var currentLocation = window.location.href;

    links.forEach((link) => {
        var href = link.getAttribute("href");
        if (currentLocation.indexOf(href) !== -1) {
            link.classList.add("active");
            link.parentNode.classList.add("active");
        }
        console.log("href : ", href);
        console.log("currenLocation : ", currentLocation);
    });
}

function setScrolledNavbar() {
    if (window.location.href.indexOf("home") === -1) {//bukan di home page shadow navbar akan langsung aktif
        navbar.classList.add("navbar-scrolled");
        console.log("excuted!");
    } else {
        window.addEventListener("scroll", () => {//di home page shadow navbar aktif ketika discroll
            if (window.scrollY > navbar.offsetHeight) {
                navbar.classList.add("navbar-scrolled");
            }
            if (window.scrollY === 0) {
                navbar.classList.remove("navbar-scrolled");
            }
        });
    }
}

const navbar = document.querySelector(".navbar");
const toggleNavbar = document.querySelector(".navbar-nav");
const toggler = document.querySelector(".navbar-toggler");

let screenWidth = window.innerWidth;
setActiveNavbar();
setScrolledNavbar();
function resizeNav() {
    if (screenWidth < 992) {
        toggleNavbar.classList.remove("show");
    } else {
        toggleNavbar.classList.add("show");
    }
}

toggler.addEventListener("click", () => {
    toggleNavbar.classList.toggle("show");
});

window.addEventListener("DOMContentLoaded", resizeNav);
window.addEventListener("resize", () => {
    screenWidth = window.innerWidth;
    resizeNav();
});

window.addEventListener("DOMContentLoaded", resizeNav);
window.addEventListener("resize", resizeNav);
//Argument to hide login button when user signed in and showing my profile instead

