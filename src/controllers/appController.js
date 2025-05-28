 const renderHome = (req, res) => {
    res.render("home");
};
 
const renderSettings = (req, res) => {
    res.render("settings");
};
 
module.exports = {
    renderHome,
    renderSettings,
};
