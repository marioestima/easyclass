const db = require("../config/database");

module.exports.getMaterials = async (req, res) => {
    try {
        const [materials] = await db.execute("SELECT * FROM Subjects");

        if (materials.length > 0) {
            return res.status(200).json({ materials });
        }

        return res.status(404).json({ message: "Nenhuma matéria foi encontrada!" });
    } catch (error) {
        console.error("Erro ao buscar materiais:", error);
        return res.status(500).json({ message: "Erro interno ao buscar materiais." });
    }
};


module.exports.uploadMaterial = async (req, res) => {
    try {
        const { name, description, descipline } = req.body;
        const file = req.file;

        if (!name || !description) {
            return res.status(400).json({ message: "Nome e descrição são obrigatórios" });
        }

        const insertMateria = "INSERT INTO `Subjects` (name, description, descipline) VALUES (?, ?,?)";
        const [resultMateria] = await db.execute(insertMateria, [name, description, descipline]);
        const materiaId = resultMateria.insertId;

        if (file) {
            const insertFileQuery = "INSERT INTO `SubjectFiles` (subject_id, filename, file_path) VALUES (?, ?, ?)";
            await db.execute(insertFileQuery, [materiaId, file.originalname, file.path]);
        }

        return res.status(201).json({
            message: "Matéria e arquivo enviados com sucesso!",
        });
    } catch (error) {
        console.error("Erro ao enviar material:", error);
        return res.status(500).json({ message: "Erro interno ao enviar material." });
    }
};

