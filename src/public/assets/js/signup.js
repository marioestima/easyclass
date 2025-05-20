const signUpForm = document.getElementById("sign-up");
const informedUserType = localStorage.getItem("usertype");

async function verifyUserTypeAndSendAdditionalInformation(userinformation) {
    try {
        const user = await userinformation;

        if (user === "student")
            return user
        else if (user === "teacher")
            // pegar o nome do documento informando e o nome da escola
            alert("user type is teacher");
        else if (user === "admin")
            // pegar o nome do documento informando e codigo da escola
            alert("user type is admin");
        return null;
    } catch(err) {
        console.log("invalid informations!", err)
    }
}

signUpForm.addEventListener("submit", async function (event) {
    event.preventDefault();
    try {

        const response = await fetch("http://localhost:8000/signup", {
            method: "POST",
            headers: {
                "Content-Type": "Application/json",
            },
            body: JSON.stringify({ firstName, lastName, informedUserType })
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