const signUpForm = document.getElementById("sign-up");

signUpForm.addEventListener("submit", async function (event) {
    event.preventDefault();
    try {

        const response = await fetch("http://localhost:8000/signup", {
            method: "POST",
            headers: {
                "Content-Type": "Application/json",
            },
            body: JSON.stringify({ firstName, lastName, userType })
        });
        const data = await response.json();
        console.log("server response: ", data);

        if (response.ok)
            window.location.href = "/login";
        alert(data.message, "intern server error");

    } catch (err) {
        console.error("Error in request");
        alert("Erro na registrar o usuario")
    }
});