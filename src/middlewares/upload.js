const multer = require("multer");

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, "documentos/");
    },
    filename: (req, file, cb) => {
        const uniqueSuffix = Date.now() + "-" + Math.round(Math.random() * 1E9);
        cb(null, uniqueSuffix + "-" + file.originalname);
    }
});

const upload = multer({ storage });

module.exports = upload;
