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


$clientes = $crd->getClientesOS();


// Incluí o cabeçalho
include "../../components/1-header.php";
?>


<div class="container-fluid ">


  <div class="row justify-content-md-center">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header azulcascar">

          <h5 class="text-left">Ordens - Geral <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="incluirOrdem()">Incluir </span> </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered thead-light data-table plusLisEst" id="tabelaOrdens" width="100%" cellspacing="0">
              <thead>
                <tr style="background: #ffffff; color: #5f5f5f;">
                  <th scope="col" style="text-align:center; width: 5%;">Cód. Cliente</th>
                  <th scope="col" style="text-align:left; width: 40%;">Cliente</th>
                  <th scope="col" style="text-align:center; width: 10%;">Veiculo</th>
                  <th scope="col" style="text-align:center; width: 10%;">Revisões Efetuadas</th>
                  <th scope="col" style="text-align:center; width: 10%;">Última Revisao</th>

                </tr>
              </thead>
              <tbody>
                <?php if (!empty($clientes)) { ?>
                  <?php foreach ($clientes as $cliente) { ?>
                    <tr>
                      <td style="text-align:center; width: 5%;"><?= $cliente['ID'] ?></td>
                      <td style="text-align:left; width: 40%;"><?= $cliente['NOME'] ?></td>
                      <td style="text-align:center; width: 10%;"><?= $cliente['VEICULO'] ?></td>
                      <td style="text-align:center; width: 10%;"><span class="maskNumero"><?= $cliente['REVISOES'] ?></span></td>
                      <td style="text-align:center; width: 10%;"><?php
                                                                  $dt = explode("-", $cliente['ULTIMA_REVISAO']);
                                                                  echo ($dt[2] . "/" . $dt[1] . "/"
                                                                    . $dt[0]);



                                                                  ?></td>
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
    function moveOrdem(cliente) {
      window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + cliente;
    }

    function atualizarPagina() {
      window.location.href = "<?= SIS_URL_LISOS ?>";
    }

    function incluirOrdem() {
      window.location.href = "<?= SIS_URL_CADOS ?>";
    }


    $(document).ready(function() {
      $(".enderecamento").mask("AA-AA-AA-AA");
      $(".maskNumero").mask("000.000.000", {
        reverse: true
      });



    });


    var table = $("#tabelaOrdens").DataTable({
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
      var novaURL = "<?= SIS_URL_LISOSCLI ?>?cli=" + data[0];
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