const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".menu");
const loginButton = document.querySelector(".login-button");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("is-active");
    menu.classList.toggle("menu-active");
});

loginButton.addEventListener("click", () => {
    window.location.href = "login.html";
});