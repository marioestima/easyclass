const loginForm = document.getElementById("login-form");
const loginBtntext = continueButton.querySelector("p");
const spinnerLoader = document.querySelector(".spinner-grow");



//essa funciolidade tem de ser integrada aqui
//quando btn de login for clicado ira aparecer um  loader que ira carregar o home
//assim que ele carregar... esse loader ira ficar dentro do botao.

loginForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    try {

        const formData = new FormData(loginForm);

        const response = await fetch("http://localhost:5000/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: formData
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (response.ok && data.token) {
            localStorage.setItem("token", data.token);
            window.location.href = "/home";
        }
        alert(data.message || "Falha no login.");

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao tentar fazer login.");
    }
});


