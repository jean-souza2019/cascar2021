<?php

require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();

$crd = new Crd($conexao);


// Consulta todos os registros

$Cliente = $_GET['cli'];
$Ordens = $crd->getOSCliente($Cliente);
$Dados_cliente = $crd->getClientePnl($Cliente);




// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">

  <div class="row justify-content-md-center">
    <div class="col-md-10">

      <div class="card">
        <div class="card-header azulcascar">

          <h5 class="text-left">Ordens por Cliente <span class="atualizar" onclick="atualizarPagina(<?= $Cliente ?>)">Atualizar </span> <span class="voltar2" onclick="voltar()">Voltar </span> </h5>
        </div>
        <div class="card-body center">
          <h5> Cliente: <b><?= $Dados_cliente[0]['NOME'] ?></b></h5>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered thead-light data-table plusLisEst" id="tabelaOrdensPorCliente" width="100%" cellspacing="0">
              <thead>
                <tr style="background: #ffffff; color: #5f5f5f;">
                  <th scope="col" style="text-align:center; width: 5%;">Nº Ordem</th>
                  <!-- <th scope="col" style="text-align:left; width: 40%;">Data Criação</th> -->
                  <th scope="col" style="text-align:center; width: 10%;">Data Criação</th>
                  <th scope="col" style="text-align:center; width: 10%;">Itens</th>
                  <th scope="col" style="text-align:center; width: 10%;">Total</th>

                </tr>
              </thead>
              <tbody>
                <?php if (!empty($Ordens)) { ?>
                  <?php foreach ($Ordens as $ordem) { ?>
                    <tr>
                      <td style="text-align:center; width: 5%;"><?= $ordem['OS'] ?></td>
                      <!-- <td style="text-align:left; width: 40%;"><?= $ordem['NOME'] ?></td> -->
                      <td style="text-align:center; width: 10%;"><?php
                                                                  $dt = explode("-", $ordem['DATA']);
                                                                  echo ($dt[2] . "/" . $dt[1] . "/"
                                                                    . $dt[0]);
                                                                  ?></td>
                      <td style="text-align:center; width: 10%;"><span class="maskNumero"><?= $ordem['QTD_ITENS'] ?></span></td>
                      <td style="text-align:center; width: 10%;">R$ <span class="maskNumero"><?= $ordem['VLR_TOTAL'] ?></span></td>



                    </tr>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  // Incluí o cabeçalho
  include "../../components/2-footer.php";

  ?>

  <script>
    function moveOrdem(cliente, ordem) {
      // window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + cliente;
      window.location.href = "<?= SIS_URL_LISORD ?>?cliente=" + cliente + "&ordem=" + ordem;
    }

    function atualizarPagina(i) {
      // window.location.href = "<?= SIS_URL_LISOS ?>";
      window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + i;

    }

    function voltar() {
      window.location.href = "<?= SIS_URL_LISOS ?>";
    }


    $(document).ready(function() {
      $(".enderecamento").mask("AA-AA-AA-AA");
      $(".maskNumero").mask("000.000.000", {
        reverse: true
      });



    });


    var table = $("#tabelaOrdensPorCliente").DataTable({
      "pageLength": 15,
      "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      },
      "order": [
        [0, 'asc']
      ]
    });





    $(".plusLisEst").on("click", "tr", function() {
      var data = table.row(this).data();
      // console.log(data);
      var novaURL = "<?= SIS_URL_LISORD ?>?cliente=<?= $Cliente ?>&ordem=" + data[0];
      $(window.document.location).attr('href', novaURL);
    });



    $(document).ready(function() {

      $(".cpf").mask("000.000.000-00");
      $(".tel").mask("(00) 0 0000-0000");


      $(".maskNumero").mask("000.000.000", {
        reverse: true
      });

    });
  </script>