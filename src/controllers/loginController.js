
//controller para login
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const db = require("../config/database");


require("dotenv").config();

module.exports.renderLogin = function (req, res) {
    res.render("auth/login", { title: "Login" });
};

module.exports.login = async function (req, res) {
    const { email, password } = req.body;

    try {
        const [rows] = await db.execute("SELECT * FROM Users WHERE email = ?", [email]);
        const user = rows[0];

        if (!user) {
            return res.status(401).json({ message: "Credenciais inválidas." });
        }
        const isValid = await bcrypt.compare(password, user.password);
        if (!isValid) {
            return res.status(401).json({ message: "Credenciais inválidas." });
        }
        const token = jwt.sign(
            { id: user.id, email: user.email, type: user.type },
            process.env.JWT_SECRET,
            { expiresIn: "2h" }
        );
        res.status(200).json({ message: "Login realizado com sucesso", token });
    } catch (err) {
        console.error(err);
        res.status(500).json({ message: "Erro interno no login." });
    }
};