const express = require("express");
const router = express.Router();
const loginController = require("../controllers/loginController");
const signUpController = require("../controllers/signUpController");


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
    signUpController.signUp
);

router.post(
    "/login",
    loginController.login
);


module.exports = router;