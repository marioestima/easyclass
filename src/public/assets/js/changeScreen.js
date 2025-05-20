const currentPath = location.pathname;
const changeButton = document.querySelector(".change-screen");

async function changeScreenIfLoaded(path) {
    try {
        const response = await fetch(path);
        if (!response.ok) return;

        const destination = response.url === "http://localhost:5000/login"
            ? "http://localhost:5000/signup"
            : "http://localhost:5000/";

        window.location.href = destination;
    } catch (err) {
        console.error("Erro interno: não foi possível localizar a página.", err);
    }
}

changeButton.addEventListener("click", (e) => {
    e.preventDefault();
    changeScreenIfLoaded(currentPath);
});
