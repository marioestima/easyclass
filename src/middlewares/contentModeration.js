// const axios = require("axios");

// async function contentModeration(req, res, next) {
//     const text = JSON.stringify(req.body);

//     try {
//         const response = await axios.post(
//             "https://api.openai.com/v1/moderations",
//             { input: text },
//             {
//                 headers: {
//                     "Content-Type": "application/json",
//                     Authorization: `Bearer ${process.env.OPENAI_API_KEY}`
//                 }
//             }
//         );

//         const results = response.data.results[0];

//         if (results.flagged) {
//             return res.status(400).json({
//                 message: "Conteúdo impróprio detectado . Revise o conteúdo antes de continuar.",
//                 categories: results.categories
//             });
//         }

//         next();
//     } catch (error) {
//         console.error("Erro na moderação de conteúdo:", error.message);
//         return res.status(500).json({ message: "Erro ao verificar o conteúdo." });
//     }
// }

// module.exports = contentModeration;

function sayHello() {
    console.log("hello world");
}

module.exports = sayHello;