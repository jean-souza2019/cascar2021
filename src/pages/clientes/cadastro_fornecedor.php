<?php
require_once 'init.php';

require('Components/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();
$crd = new Crd($conexao, $dashboard);

// $objetos = $crd->getFornecedoresSenior();

// Incluí o cabeçalho
include "1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header">
          <h5 class="text-left"><a href="#" title="Cadastro Senha" class="link">Cadastrar Fornecedor</a></h5>
        </div>

        <div class="card-body">
          <form class="form-cadfor" action="gerar_fornecedor" method="POST">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-2">
                  <div class="form-group">
                    <label>CNPJ*</label>
                    <input type="text" class="form-control" onchange="buscarFornecedor();buscarCodFornecedor();" id="cgccpf" name="cgccpf" placeholder="" autofocus="true" required>
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label>Código</label>
                    <input type="text" class="form-control" id="codfor" name="codfor" placeholder="" autofocus="true" readonly=“true”>
                  </div>
                </div>


                <div class="col-md-8">
                  <div class="form-group">
                    <label>Fornecedor</label>
                    <input type="text" class="form-control" id="nomfor" name="nomfor" placeholder="" autofocus="true" readonly=“true”>
                  </div>
                </div>



                <div class="col-md-1">
                  <div class="form-group">
                    <label>Situação</label>
                    <select class="form-control" name="sitfor" placeholder="Situação" required>
                      <option value="A" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITTIP == 'A') ? ' selected ' : '';
                                        } ?>>Ativo</option>
                      <option value="I" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITTIP == 'I') ? ' selected ' : '';
                                        } ?>>Inativo</option>
                    </select>
                  </div>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row justify-content-md-center">
                  <div class="form-label-group">
                    <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">
                      INCLUIR
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
    // Incluí o cabeçalho
    include "2-footer.php";
    ?>

    <script>
      function salvarDados() {
        $('.form-cadfor').submit();
      }

      $(document).ready(function() {
        $('.busslc').select2();
      });


      function buscarFornecedor() {

        var req;
        // console.log('teste');
        // Verificando Browser
        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
          req = new ActiveXObject("Microsoft.XMLHTTP");
        }

        //  buscar nome fornecedor

        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var cgccpf = document.getElementById('cgccpf').value;
        resultado = cgccpf.replace(/[^\d]+/g, '');
        var cgccpf = resultado;
        if (cgccpf > 0) {
          console.log(cgccpf);

          var url = "gerar_nome_fornecedores?cod=" + cgccpf;

          // Chamada do método open para processar a requisição
          req.open("Get", url, true);
          // Quando o objeto recebe o retorno, chamamos a seguinte função;
          req.onreadystatechange = function() {
            // Exibe a mensagem "Buscando Distribuidores e Revendedores..." enquanto carrega
            if (req.readyState == 1) {
              document.getElementById("nomfor").value = 'Buscando Fornecedor...';
            }
            if (req.readyState == 4 && req.status == 200) {
              var resposta = req.responseText;
              // console.log(resposta);
              document.getElementById("nomfor").value = resposta;
              if (resposta === "") {
                // alert("Fornecedor inativo ou inexistente.");
                document.getElementById("codfor").value = "";
              }
            }
          }
          req.send(null);
        } else {
          document.getElementById("codfor").value = "";
          document.getElementById("cgccpf").value = "";
          document.getElementById("nomfor").value = "";
        }
      }

      function buscarCodFornecedor() {

        var req;
        // console.log('teste');
        // Verificando Browser
        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
          req = new ActiveXObject("Microsoft.XMLHTTP");
        }

        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var cgccpf = document.getElementById('cgccpf').value;
        resultado = cgccpf.replace(/[^\d]+/g, '');
        var cgccpf = resultado;
        document.getElementById("cgccpf").value = resultado;

        if (cgccpf > 0) {
          var urlCod = "gerar_cod_fornecedores?cod=" + cgccpf;

          // Chamada do método open para processar a requisição
          req.open("Get", urlCod, true);
          // Quando o objeto recebe o retorno, chamamos a seguinte função;
          req.onreadystatechange = function() {
            // Exibe a mensagem "Buscando Distribuidores e Revendedores..." enquanto carrega
            if (req.readyState == 1) {
              document.getElementById("codfor").value = '';
            }
            if (req.readyState == 4 && req.status == 200) {
              var resposta2 = req.responseText;
              // console.log(resposta2);
              document.getElementById("codfor").value = resposta2;

              if (resposta2 === "") {

                alert("Fornecedor inativo ou inexistente.");
                document.getElementById("codfor").value = "";
                document.getElementById("cgccpf").value = "";
              }
            }
          }
          req.send(null);
        } else {
          document.getElementById("codfor").value = "";
          document.getElementById("cgccpf").value = "";
          document.getElementById("nomfor").value = "";
        }
      }


      // Formatar maskara do Cnpj
      function formatoDoc() {
        // $(document).ready(function() {
        //   var cnpjcpf = $("#cgccpf").val().length;
        //   if (cnpjcpf <= 11) {
        //     $("#cgccpf").mask("999.999.999-99");
        //   } else {
        //     $("#cgccpf").mask("99.999.999/9999-99");
        //   }
        // });
      }
    </script>