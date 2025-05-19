const loginForm = document.getElementById("login-form");

loginForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    try {
        const email = document.getElementById("input-email").value;
        const password = document.getElementById("input-password").value;

        const response = await fetch("http://localhost:8000/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (response.ok && data.token) {
            localStorage.setItem("token", data.token);
            window.location.href = "/home";
        } else {
            alert(data.message || "Falha no login.");
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao tentar fazer login.");
    }
});


