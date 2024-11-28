const menuBtn = document.getElementById("menu-btn");
const darkMode = document.querySelector(".dark-mode");
const closeBtn = document.getElementById("close-btn");
const sideMenu = document.getElementById("aside");
const bd = document.getElementById("bdy");

//#TODO as datas de acordo com data do upload
var nowDate = new Date();

if (menuBtn) {
    menuBtn.addEventListener("click", () => {
        sideMenu.style.display = "block";
    });
}

if (closeBtn) {
    closeBtn.addEventListener("click", () => {
        sideMenu.style.display = "none";
    });
}

if (darkMode) {
    darkMode.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode-variables");

        darkMode.querySelector("span:nth-child(1)").classList.toggle("active");
        darkMode.querySelector("span:nth-child(2)").classList.toggle("active");
        return;
    });
}

document.querySelector("table tbody").addEventListener("click", (e) => {
    if (e.target.classList.contains("primary")) {
        window.location.href = '../includes/details.php'
    }
});
