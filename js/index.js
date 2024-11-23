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
const Materials = [
    {
        materiaName: "titulo 1", materiaCurse: "informatica", materiaSubject: "Seac", date: nowDate.toDateString()
    },
    {
        materiaName: "titulo 2", materiaCurse: "informatica de Gestão", materiaSubject: "TLP", date: nowDate.toDateString()
    },
    {
        materiaName: "titulo 3", materiaCurse: "Sistemas informaticos", materiaSubject: "Trei", date: nowDate.toDateString()
    },
    {
        materiaName: "titulo 4", materiaCurse: "Electronica e telecom", materiaSubject: "Trei", date: nowDate.toDateString()
    }
];

Materials.forEach(material => {
    const tr = document.createElement("tr");

    const trContent = `
        <td class='primary' style="font-width: bold;">${material.materiaName}</td>
        <td class='primary'>${material.materiaCurse}</td>
        <td class='danger'>${material.materiaSubject}</td>
        <td class='primary'>${material.date}</td>

        <td class="primary">Detalhes</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector("table tbody").appendChild(tr);
});

document.querySelector("table tbody").addEventListener("click", (e) => {
    if (e.target.classList.contains("primary")) {
        alert('este botao foi clicado agora...');
    }
});
