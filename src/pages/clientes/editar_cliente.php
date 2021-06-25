<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
$crd = new Crd($conexao);

$objetos = $crd->getClientePnl($_GET['id']);

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Cadastro Cliente" class="link">Editar Cadastro Cliente</a></h5>
        </div>

        <div class="card-body">
          <form class="form-cli" action="update_cliente.php" method="POST">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-2">
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php foreach ($objetos as $item) echo $item['ID'] ?>" autofocus="true" readonly="true">
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-group">
                    <label>Nome*</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php foreach ($objetos as $item) echo $item['NOME'] ?>" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                    <label>CPF*</label>
                    <input class="form-control" id="cpfcnpj" name="cpfcnpj" value="<?php foreach ($objetos as $item)
                                                                                      if (strlen($item['CPFCNPJ']) < 11) {
                                                                                        $dif = 11 - strlen($item['CPFCNPJ']);
                                                                                        $acrescento = 0;
                                                                                        for ($x = 1; $x < $dif; $x += 1) {
                                                                                          $acrescento = $acrescento . "0";
                                                                                        }
                                                                                        echo $acrescento . $item['CPFCNPJ'];
                                                                                      } elseif ((strlen($item['CPFCNPJ']) >= 11) and (strlen($item['CPFCNPJ']) < 14)) {
                                                                                        $dif = 14 - strlen($item['CPFCNPJ']);
                                                                                        $acrescento = 0;
                                                                                        for ($x = 1; $x < $dif; $x += 1) {
                                                                                          $acrescento = $acrescento . "0";
                                                                                        }
                                                                                        echo $acrescento . $item['CPFCNPJ'];
                                                                                      } else {
                                                                                        echo $item['CPFCNPJ'];
                                                                                      }

                                                                                    ?>" placeholder="" autofocus="true">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Telefone*</label>
                    <input class="form-control" id="telefone" name="telefone" value="<?php foreach ($objetos as $item) echo $item['TELEFONE'] ?>" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php foreach ($objetos as $item) echo $item['EMAIL'] ?>" placeholder="" >
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cidade*</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php foreach ($objetos as $item) echo $item['CIDADE'] ?>" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php foreach ($objetos as $item) echo $item['BAIRRO'] ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php foreach ($objetos as $item) echo $item['ENDERECO'] ?>" />
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" name="cep" id="cep" pattern="[0-9]+$" value="<?php foreach ($objetos as $item) echo $item['CEP'] ?>" />
                  </div>
                </div>


                <!-- Cadastros Veiculo -->
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Veiculo</label>
                        <input class="form-control" name="veiculo" id="veiculo" value="<?php foreach ($objetos as $item) echo $item['VEICULO'] ?>" />
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Modelo</label>
                        <input class="form-control" name="modelo" id="modelo" value="<?php foreach ($objetos as $item) echo $item['MODELO'] ?>" />
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Ano</label>
                        <input class="form-control" name="ano" id="ano" value="<?php foreach ($objetos as $item) echo $item['ANO'] ?>" />
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Placa</label>
                        <input class="form-control" name="placa" id="placa" value="<?php foreach ($objetos as $item) echo $item['PLACA'] ?>" />
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
                    <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">SALVAR</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php
      // Incluí o cabeçalho
      include "../../components/2-footer.php";
      ?>

      <script>
        function salvarDados() {
          $('.form-cli').submit();

        }


        function atualizarPagina() {
          window.location.href = "<?= SIS_URL_EDITCLI ?>";
        }


        $(document).ready(function() {
          // Tratamento para input de telefone ser apenas número
          document.getElementById("telefone").onkeypress = function(e) {
            var chr = String.fromCharCode(e.which);
            if ("1234567890".indexOf(chr) < 0)
              return false;
          };

          // Tratamento para input de cpf ser apenas número
          document.getElementById("cpfcnpj").onkeypress = function(e) {
            var chr = String.fromCharCode(e.which);
            if ("1234567890".indexOf(chr) < 0)
              return false;
          };

          // Tratamento para input de Ano ser apenas número
          document.getElementById("cep").onkeypress = function(e) {
            var chr = String.fromCharCode(e.which);
            if ("1234567890".indexOf(chr) < 0)
              return false;
          };

          // Tratamento para input de Cep ser apenas número
          document.getElementById("ano").onkeypress = function(e) {
            var chr = String.fromCharCode(e.which);
            if ("1234567890".indexOf(chr) < 0)
              return false;
          };

        });
      </script>