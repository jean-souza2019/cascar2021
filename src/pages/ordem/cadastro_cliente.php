<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
$crd = new Crd($conexao);

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Cadastrar Cliente" class="link">Cadastrar Cliente</a></h5>
        </div>

        <div class="card-body">
          <form class="form-cadcli" action="gerar_cliente" method="POST">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-8">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" id="cpfcnpj" name="cpfcnpj" placeholder="" autofocus="true">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Telefone</label>
                    <input class="form-control" id="telefone" name="telefone" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" name="cep" id="cep" pattern="[0-9]+$" />
                  </div>
                </div>


                <!-- Cadastros Veiculo -->
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Veiculo</label>
                        <input class="form-control" name="veiculo" id="veiculo" />
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Modelo</label>
                        <input class="form-control" name="modelo" id="modelo" />
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Ano</label>
                        <input class="form-control" name="ano" id="ano" />
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Placa</label>
                        <input class="form-control" name="placa" id="placa" />
                      </div>
                    </div>



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
    // Incluí o rodapé
    include "../../components/2-footer.php";

    ?>

    <script>
      function salvarDados() {
        $('.form-cadcli').submit();
      }

      $(document).ready(function() {
        //   $('.busslc').select2();



        // // Ajustar CEP
        // $('#cep').mask('00000-000');

        // // Ajustar Telefone
        // $('#telefone').mask('(00) 0 0000-0000');

        // // Ajustar CPF
        // $('#cpfcnpj').mask('000.000.000-00');

      });


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