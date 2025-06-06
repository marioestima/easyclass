const express = require("express");
const bodyParser = require("body-parser");
const path = require("path");

const authRoutes = require("./routes/authRoutes");
const appRoutes = require("./routes/appRoutes");
const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

app.use(express.static(path.join(__dirname, "public")));

app.use("/", authRoutes);
app.use("/", appRoutes);

app.get("/", (req, res) => {
    res.redirect("/login");
});

 
module.exports = app;
