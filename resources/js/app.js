require('./bootstrap');

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("stickNav");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
        document.getElementById("stickNav").style.setProperty("z-index", "9999", "important");
    } else {
        if (navbar.classList.contains("sticky")) {
            navbar.classList.remove("sticky");
        } else {
            navbar.classList.add("sticky");
        }
    }
}
