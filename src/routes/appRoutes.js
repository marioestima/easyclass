const express = require("express");
const router = express.Router();
const appController = require("../controllers/appController");
const { single } = require("../utils/multer");

// const authMiddleware = require("../middlewares/auth");

router.get(
  "/home",
  appController.renderHome
);

router.get(
  "/404",
  appController.notFound
)

router.get(
  "/settings",
  appController.renderSettings
);

// router.post("/upload", single("material"), userController.uploadMaterial);

module.exports = router;
