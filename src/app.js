const express = require("express");
const bodyParser = require("body-parser");
const path = require("path");

const authRoutes = require("./routes/authRoutes");
const userRoutes = require("./routes/userRoutes");

const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

app.use(express.static(path.join(__dirname, "public")));

app.use("/", authRoutes);
app.use("/", userRoutes);


app.get("/", (req, res) => {
    res.redirect("/login");
});
 
app.use((req, res, next) => {
    res.status(404).render("404", { message: "Página não encontrada." });
});

module.exports = app;
