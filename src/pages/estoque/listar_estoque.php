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


$objetos = $crd->getEstoque();


// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header azulcascar">

        <h5 class="text-left">Estoque <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarItem()">Incluir </span> </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered thead-light data-table plusLisEst" id="dataTableAll" width="100%" cellspacing="0">
            <thead>
              <tr style="background: #ffffff; color: #5f5f5f;">
                <th scope="col" style="text-align:center;width: 5%;">Código</th>
                <th scope="col" style="text-align:left; width: 40%;">Descrição</th>
                <th scope="col" style="text-align:center; width: 10%;">Endereçamento</th>
                <th scope="col" style="text-align:center; width: 10%;">Valor Unitário</th>
                <th scope="col" style="text-align:center; width: 10%;">Quantidade Estoque</th>

              </tr>
            </thead>
            <tbody>
              <?php if (!empty($objetos)) { ?>
                <?php foreach ($objetos as $item) {
                  if ($item['EXCLUIDO'] == 0) { ?>
                    <tr>
                      <td style="text-align:center;width: 5%;"><?= $item['CODIGO'] ?></td>
                      <td style="text-align:left; width: 40%;"><?= $item['DESCRICAO'] ?></td>
                      <td style="text-align:center; width: 10%;" class="enderecamento"><?= $item['ENDERECAMENTO'] ?></td>
                      <td style="text-align:center; width: 10%;"> R$ <span class="maskNumero"><?= $item['VALOR'] ?></span></td>
                      <td style="text-align:center; width: 10%;" class="maskNumero"><?= $item['QUANTIDADE_ESTOQUE'] ?></td>
                    </tr>
                <?php }
                } ?>
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
  function atualizarPagina() {
    window.location.href = "<?= SIS_URL_LISEST ?>";
  }

  function cadastrarItem() {
    window.location.href = "<?= SIS_URL_CADITEM ?>";
  }


  $(document).ready(function() {
    $(".enderecamento").mask("AA-AA-AA-AA");
    $(".maskNumero").mask("000.000.000", {
      reverse: true
    });



  });


  var table = $("#dataTableAll").DataTable({
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
    var novaURL = "<?= SIS_URL ?>src/pages/estoque/item?item=" + data[0];
    $(window.document.location).attr('href', novaURL);
  });
</script>