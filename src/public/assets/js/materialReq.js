async function commentMaterial(id) {

    const fromData = new FormData(commentForm);

    try {
        const response = await fetch("http://localhost:5000/material", {
            method: "POST",
            headers: { "Content-type": "Application/json" },
            body: { fromData },
        });

        const data = await response.json();

        console.log("Resposta do Servidor", data);

        if (response && data) {
            return data;
        }
        
    } catch {
        console.error("Erro interno do sistem", err);
    }
}

async function previewMaterial(id) {

    try {
        const response = await fetch(`http://localhost/5000/material/${id}`);
        const data = await response.json();

        if (response.ok && data)
            return data;
        return [];

    } catch (err) {
        console.error("Erro Interno do sistema", err);
    }
}