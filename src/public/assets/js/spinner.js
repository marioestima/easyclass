const continueButton = document.getElementById("continueButton");
const emailField = document.getElementById("input-email");
const passwordField = document.getElementById("input-password");
const spinnerLoader = document.querySelector(".spinner-grow");
const errorPopup = document.querySelector(".ErrorPopUp");
const paragraph = continueButton.querySelector("p");

function handleLoginError() {
    errorPopup.classList.toggle("d-none");
}

function verifyUrlAndChangeButtonText(url, buttonText) {
    return url === location.pathname ? buttonText : "Continuar";
}

function hideButtonText(textStyle) {
    textStyle.display = "none";
}

function toggleSpinner(element) {
    element.classList.toggle("hidden");
}

function isInputFilled(input) {
    return input.trim() !== "";
}

continueButton.addEventListener("click", function (e) {
    e.preventDefault();

    const customBtnText = verifyUrlAndChangeButtonText("/screens/login.html", "Login Bem Sucedido!");

    if (isInputFilled(passwordField.value) && isInputFilled(emailField.value)) {
        if (paragraph) hideButtonText(paragraph.style);
        toggleSpinner(spinnerLoader);
    } else {
        alert("vazios");
    }
});