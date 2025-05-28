const express = require("express");
const router = express.Router();

const appController = require("../controllers/appController");
const materialController = require("../controllers/materialController");
const contentModeration = require("../middlewares/contentModeration");
const upload = require("../middlewares/upload");

router.get(
    "/home",
    appController.renderHome
);

router.get(
    "/settings",
    appController.renderSettings
);

router.get(
    "/home",
    materialController.getMaterials
);

router.post(
    "/upload",
    contentModeration,
    upload.single("material"),
    materialController.uploadMaterial
);



module.exports = router;
