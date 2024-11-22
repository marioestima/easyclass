let searchTerm = document.getElementById("search");

function VerifyEachLetter(str) {
    let cont = 0;
    for (char of str) {
        cont = cont + 1;
        if (char == char[cont]) {
            cont;
        }
    }
    return cont;
}

function search_results() {
    let tips = VerifyEachLetter(searchTerm.value);
    document.addEventListener("submit", () => {
        console.log('valor contem o valor de pesquisa' + { tips });
    })
}

