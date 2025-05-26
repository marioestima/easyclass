const db = require("../config/database");

renderHome = (req, res) => {
    res.render("home");
};

renderSettings = (req, res) => {
    res.render("settings");
};

notFound = (req, res) => {
    res.render("404");
}

getMaterialInformation = async function getMaterials(req, res) {
    const [materials] = await db.execute("SELECT * FROM Subjects");

    if (materials) res.status(200).json({ materials });
    res.status(404).json({
        message: "Nenhuma materia foi encontrada!"
    });
}

uploadMaterial = async (req, res) => {
    try {
        const { name, description } = req.body;
        const file = req.file;

        if (!name || !description) {
            res.status(400).json({ message: "Nome e descrição são obrigatórios" });
        }

        const insertMateriaQuery = "INSERT INTO `Subjects` (name, description) VALUES (?,?)";
        const [resultMateria] = await db.execute(insertMateriaQuery, [name, description]);
        const materiaId = resultMateria.insertId;

        if (file) {
            const insertFileQuery = "INSERT INTO `SubjectFiles` (subject_id, filename,file_path) VALUES (?, ?, ?)";
            await db.execute(insertFileQuery, [
                materiaId,
                file.originalname,
                file.path
            ]);
        }

        res.status(201).json({
            message: "Matéria e arquivo enviados com sucesso!",
            materia_id: materiaId
        });

    } catch (err) {
        console.error("Erro ao enviar material:", error);
        res.status(500).json({ message: "Erro interno ao enviar material." });
    }
}



module.exports = {
    renderHome,
    renderSettings,
    uploadMaterial,
    getMaterialInformation,
    notFound,
}