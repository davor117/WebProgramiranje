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

const posts = document.querySelectorAll(".post");
posts.forEach(post => {
  post.addEventListener("mouseover", () => {
    post.classList.add("pet");
  });
  post.addEventListener("mouseout", () => {
    post.classList.remove("pet");
  });
});


document.getElementById("search-btn").addEventListener("click", function() {
  var searchTerm = document.getElementById("search-bar").value.toLowerCase();
  var petDivs = document.querySelectorAll("#pets > div");

  for (var i = 0; i < petDivs.length; i++) {
    var petType = petDivs[i].querySelector("p:nth-of-type(2)").textContent.toLowerCase();
    if (petType.indexOf(searchTerm) === -1) {
      petDivs[i].style.display = "none";
    } else {
      petDivs[i].style.display = "block";
      document.getElementById("pets").insertBefore(petDivs[i], document.getElementById("pets").firstChild);
    }
  }
});
