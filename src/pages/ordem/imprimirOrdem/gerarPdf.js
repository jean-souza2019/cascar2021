// import React from 'react';

pdf = require("html-pdf");
ejs = require("ejs");

// const geraPdf = (props) => {
    // import pdf from 'pdf';
    // import ejs from 'ejs';

    
    var nomCli = " Jean Marcos";
    var telCli = " (54) 99666-66666";
    var docCli = " 044.888.455.55";
    var emlCli = " jean.marcos@email.com.br";
    
    var cepCli = " 99955-5555";
    var cidCli = " São Paulo";
    var baiCli = " Navegantes";
    var endCli = " Viela 12, sobrado 22";
    var veiCli = " Golf";
    var plaVei = " IAT9I22";
    var anoVei = " 2001/1.6";

    

        ejs.renderFile("./meuArquivo.ejs", { 
            nome: nomCli, 
            telefone: telCli,
            documento: docCli,
            email: emlCli,
            cep: cepCli,
            cidade: cidCli,
            bairro: baiCli,
            endereco: endCli,
            veiculo: veiCli,
            placa: plaVei,
            ano: anoVei }, (err, html) => {
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
        })
    // }


// export default geraPdf;