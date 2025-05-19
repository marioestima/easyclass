const express = require("express");
const router = express.Router();
const authenticationController = require("../controllers/authController");


router.get(
    "/login",
    authenticationController.renderLogin
);

router.get(
    "/signup",
    authenticationController.renderSignup
);

router.post(
    "/signup",
    authenticationController.signUp
);

router.post(
    "/login",
    authenticationController.loginAuth
);


module.exports = router;