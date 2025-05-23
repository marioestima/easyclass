const signUpForm = document.getElementById("sign-up");
const informedUserType = localStorage.getItem("usertype");


signUpForm.addEventListener("submit", async function (event) {
    event.preventDefault();
    try {

        const formData = new formData(signUpForm);
        const response = await fetch("http://localhost:8000/signup", {
            method: "POST",
            headers: {
                "Content-Type": "Application/json",
            },
            body: formData
        });
        const data = await response.json();
        console.log("server response: ", data);

        if (response.ok)
            window.location.href = "/login";
        alert(data.message, "internal server  :(");

    } catch (err) {
        console.error("Error in request");
        alert("Erro na registrar o usuario")
    }
});