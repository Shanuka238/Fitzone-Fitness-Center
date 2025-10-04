document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-btn");
    const navbar = document.querySelector(".navbar");

    menuBtn.addEventListener("click", function () {
        navbar.classList.toggle("active");
    });
    
});

function toggleForms() {
    document.getElementById("register-box").classList.toggle("hidden");
    document.getElementById("login-box").classList.toggle("hidden");
}

function togglePassword(inputId, icon) {
    let passwordField = document.getElementById(inputId);
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.replace("bx-show", "bx-hide");
    } else {
        passwordField.type = "password";
        icon.classList.replace("bx-hide", "bx-show");
    }
}

