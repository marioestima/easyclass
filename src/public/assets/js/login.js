const loginForm = document.getElementById("login-form");
const errorLog = document.querySelector(".error");

loginForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    const email = loginForm.email.value;
    const password = loginForm.password.value;

    try {
        const response = await fetch("http://localhost:5000/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (response.ok && data.token) {
            localStorage.setItem("token", data.token);
            setTimeout(() => {
                window.location.href = "http://localhost:5000/home";
            }, 2000);
        } else {
            errorLog.innerText = data.message || "Falha no login.";
            errorLog.classList.toggle("hide");
            setTimeout(() => {
                errorLog.classList.toggle("hide");
            }, 2000);
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        errorLog.innerText = "Erro ao tentar fazer login.";
        errorLog.classList.toggle("hide");
        setTimeout(() => {
            errorLog.classList.toggle("hide");
        }, 2000);
    }
});
