const multer = require("multer");
const fs = require("fs");
 

exports.showHome = (req, res) => {
    res.render("home");
};

exports.showSettings = (req, res) => {
    res.render("settings");
};

exports.uploadMaterial = async function (req, res) {
    //TODO permitir que o o ficheiro suas informacoes forem enviadas para a tabela de ficheiros.
    try {
        const query = "INSERT INTO Materias (name, description) VALUES (?,?)";
        const { name, description, file } = req.body;
        const [row] = await db.execute(query, [name, description]);

        const response = row[0];
        if (!response) {
            res.status(201).json({ message: "Nao foi possivel enviar a Materia" });
        }
        res.status(200).json({
            message: "Material enviado com sucesso!",
            data: response,
        });
    } catch (err) {
        console.err("Internal server Error", err);
        res.status(201).json({ message: "Ocorreu um erro!" });
    }
};
