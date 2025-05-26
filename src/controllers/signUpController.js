const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const db = require("../config/database");


require("dotenv").config();

module.exports.renderSignup = function (req, res) {
  res.render("auth/signup", { title: "Cadastrar" });
};
 

module.exports.signUp = async (req, res) => {
  const { name, email, password, type } = req.body;
  const file = req.file;
  //todo verificar tipo de de usuario se for professor ou cordernador/admin ele tem de pagar 
  // o documento validar e enviar para para documentos e posteriomente essa informacao para o 
  // banco de dados
  try {
    const [existing] = await db.execute("SELECT id FROM users WHERE email = ?", [email]);
    if (existing.length > 0) {
      return res.status(400).json({ message: "Usuário já cadastrado." });
    }
    const hash = await bcrypt.hash(password, 10);
    await db.execute(
      "INSERT INTO users (first_name, last_name, password, type) VALUES (?, ?, ?, ?)",
      [name, email, hash, type]
    );
    res.status(201).json({ message: "Usuário cadastrado com sucesso." });
  } catch (err) {
    console.error(err);
    res.status(500).json({ message: "Erro ao cadastrar." });
  }
};


