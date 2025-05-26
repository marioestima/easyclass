const togglePassword = document.querySelector(".icon-eye");
const signUpForm = document.getElementById("sign-up");
const informedUserType = localStorage.getItem("usertype");


togglePassword.addEventListener("click", () => {
    if (inputPassword.type == "password") {
        inputPassword.type = "text";
        togglePassword.classList.toggle("fa-eye-slash");
    } else {
        inputPassword.type = "password";
        togglePassword.classList.toggle("fa-eye");
    }
});

signUpForm.addEventListener("submit", async function (event) {
    event.preventDefault();
    try {
        const formData = new FormData(signUpForm);
        formData.append("usertype", informedUserType);

        const response = await fetch("http://localhost:5000/signup", {
            method: "POST",
            headers: {
                "Content-Type": "Application/json"
            },
            body: formData
        });

        const data = await response.json();
        console.log("server response:", data);

        if (response.ok) {
            window.location.href = "/login";
        } else {
            alert(data.message || "Erro interno no servidor :(");
        }

    } catch (err) {
        console.error("Erro na requisição:", err);
        alert("Erro ao registrar o usuário");
    }
});
