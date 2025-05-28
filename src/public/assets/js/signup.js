const levels = document.querySelectorAll(".level");
const authContainer = document.querySelector(".auth-container");
const userTypeSelectedSpan = document.getElementById("user-type-selected");
let selectedUserType = null;

 
// Toggle senha
const togglePassword = document.getElementById("toggle-password");
const inputPassword = document.getElementById("input-password");

togglePassword.addEventListener("click", () => {
    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        togglePassword.classList.add("fa-eye-slash");
        togglePassword.classList.remove("fa-eye");
    } else {
        inputPassword.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    }
});

// Submissão do formulário
form.addEventListener("submit", async (event) => {
    event.preventDefault();

    if (!selectedUserType) {
        alert("Por favor, selecione o seu nível antes de cadastrar.");
        return;
    }

 
    const formData = new FormData(form);
    formData.append("usertype", selectedUserType);

 
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    try {
        const response = await fetch("/signup", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok) {
            alert("Cadastro realizado com sucesso!");
            window.location.href = "/login";
        } else {
            alert(result.message || "Erro interno no servidor.");
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao registrar o usuário.");
    }
});