const bcrypt = require("bcryptjs");
const db = require("../config/database");
  
exports.renderSignup = (req, res) => {
  res.render("auth/signup");
};


module.exports.signUp = async (req, res) => {
  const { firstname, lastname, email, password, usertype } = req.body;
  const file = req.file;

  try {
    const [existing] = await db.execute("SELECT id FROM Users WHERE email = ?", [email]);
    if (existing.length > 0) {
      return res.status(400).json({ message: "Usuário já cadastrado." });
    }

    if ((usertype === "teacher" || usertype === "admin") && !file) {
      return res.status(400).json({ message: "Envie o documento para validação." });
    }

    if (file) {
      await db.execute(
        "INSERT INTO documentos (email, path, status) VALUES (?, ?, ?)",
        [email, file.path, 'pendente']
      );
    }

    const hash = await bcrypt.hash(password, 10);

    await db.execute(
      "INSERT INTO Users (first_name, last_name, email, password, type) VALUES (?, ?, ?, ?, ?)",
      [firstname, lastname, email, hash, usertype]
    );

    res.status(201).json({ message: "Usuário cadastrado com sucesso." });

  } catch (err) {
    console.error(err);
    res.status(500).json({ message: "Erro ao cadastrar." });
  }
};
