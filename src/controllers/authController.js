const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const db = require("../config/database");

require("dotenv").config();

exports.renderLogin = function (req, res) {
  res.render("auth/login", { title: "Login" });
};

exports.renderSignup = function (req, res) {
  res.render("auth/signup", { title: "Cadastrar" });
};

exports.loginAuth = async function (req, res) {
  const { email, password } = req.body;

  try {
    const [rows] = await db.execute("SELECT * FROM users WHERE email = ?", [email]);
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

exports.signUp = async function (req, res) {
  const { name, email, password, type } = req.body;

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
