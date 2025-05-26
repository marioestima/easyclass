const mysql = require('mysql2/promise');
require('dotenv').config();


async function connection() {
  const database = await mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME
  });

  if (!database) {
    console.lo("Erro ao conectar com banco de dados!");
  } else {
    console.log("Banco de dados conectado com sucesso!");
  }

  return database;
}


module.exports = connection;

