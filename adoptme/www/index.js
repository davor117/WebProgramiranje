let hamburgerMenu = document.querySelector('#hamburger-menu');
let hiddenMenu = document.querySelector('.hamburger-items');

hamburgerMenu.addEventListener('click', function() {
  hiddenMenu.classList.toggle('show');
});

let newsletterThank = document.getElementById("newsletter-thankyou");
let userInput = document.getElementById("enter-email");
let userList = document.getElementById("list");

function subscribe(){
    if (userInput.value.indexOf("@") !== -1){
        newsletterThank.textContent = "Thank you for subscribing!";
    } else {
        newsletterThank.textContent = "Please enter a valid email!";
    }
}
