const continueButton = document.getElementById("continueButton");
const spinnerLoader = document.querySelector(".spinner-grow");
 

continueButton.addEventListener("click", function (e) {
    e.preventDefault();

    if (isInputFilled(passwordField.value) && isInputFilled(emailField.value)) {
        if (paragraph) hideButtonText(paragraph.style);
        toggleSpinner(spinnerLoader);
    } else {
        alert("vazios");
    }
});