async function updateResults(searchTerm) {
    // os resultados tem de ser apresentados a medida que usuario digita
    try {
        const response = await fetch("http://localhost:5000/materials");
        if (!response.ok)
            console.log("internal server error", response.error);
        const data = await response.json();

        if (data) {
            data.map((result) => {
                ResultsContainer.innerHTML += `
           <div class="result-items">
                <span class="item">
                    <p class="resutado">${results.name} - ${result.date}</p>
                    <i class="fas fa-magnifying-glass"></i>
                </span>
            </div>
          `.join("");
            });
            searchMaterial();
        }
    } catch (err) {
        console.err("not match results :(", err);
    }
}

function searchMaterial() {
    const value = searchField.value.toLowerCase();

    materialNames.forEach((materialName) => {
        if (materialName.textContent.toLowerCase().includes(value)) {
            materialName.style.display = "flex";
        } else {
            materialName.style.display = "none";
        }
    });
}