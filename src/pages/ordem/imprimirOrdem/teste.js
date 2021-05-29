var pdf = require('html-pdf');
var ejs = require('ejs');


var nomeDoUsuario = "Jean";
var curso = "Ciencias da Computação";
var categoria = "React";


ejs.renderFile("./meuArquivo.ejs", { nome: nomeDoUsuario, curso: curso, categoria: categoria }, (err, html) => {
    if (err) {
        console.log("ERRO!");
    } else {
        pdf.create(html, {}).toFile("./meuPdf.pdf", (err, res) => {
            if (err) {
                console.log("Um erro aconteceu.");
            } else {
                console.log(res);
            }
        })

    }
});
