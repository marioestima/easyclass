const express = require("express");
const router = express.Router();
const loginController = require("../controllers/loginController");
const signUpController = require("../controllers/signUpController");
const upload = require("../middlewares/upload");


router.get(
    "/login",
    loginController.renderLogin
);

router.get(
    "/signup",
    signUpController.renderSignup
);

router.post(
    "/signup",
    upload.single("document"),
    signUpController.signUp
);

router.post(
    "/login",
    loginController.login
);


module.exports = router;