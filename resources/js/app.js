require('./bootstrap');

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("nav-opacity");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
        document.getElementById("nav-opacity").style.setProperty("background-color", "rgba(200,200,200,0.9)", "important");
    } else {
        navbar.classList.remove("sticky");
    }
}