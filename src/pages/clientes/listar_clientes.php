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


$objetos = $crd->getClientes();


// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header azulcascar">

        <h5 class="text-left">Clientes <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarCliente()">Incluir </span> </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered thead-light data-table" id="dataTableAll2" width="100%" cellspacing="0">

            <thead>
              <tr style="background: #ffffff; color: #5f5f5f;">
                <!-- <th scope="col">ID</th> -->
                <th scope="col" style="text-align:center;width: 5%;">Código</th>
                <th scope="col" style="text-align:left; width: 35%;">Nome</th>
                <th scope="col" style="text-align:center; width: 15%;">CPF</th>
                <th scope="col" style="text-align:center; width: 15%;">Cidade</th>
                <th scope="col" style="text-align:center; width: 15%;">Telefone</th>
                <th scope="col" style="text-align:center; width: 15%;">Veiculo</th>
                <th scope="col" style="text-align:center;width: 20%;">Opções</th>

              </tr>
            </thead>
            <tbody>
              <?php if (!empty($objetos)) { ?>
                <?php foreach ($objetos as $item) { ?>
                  <tr>

                    <td style="text-align:center;width: 5%;"><?= $item['ID'] ?></td>
                    <td style="text-align:left; width: 35%;"><?= $item['NOME'] ?></td>
                    <td style="text-align:center; width: 15%;" class="cpf"><?php

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



                                                                            ?></td>
                    </td>
                    <td style="text-align:center; width: 15%;"><?= $item['CIDADE'] ?></td>
                    <td style="text-align:center; width: 8%;" class="tel"><?= $item['TELEFONE'] ?></td>
                    <td style="text-align:center; width: 8%;"> <?= $item['VEICULO'] ?></td>

                    <td style="text-align:center; width: 6%;" class=" btn-acoes">
                      <a class="btn btn-outline-danger btn-sm" href="excluir_cliente?id=<?= $item['ID'] ?>" role="button"><i class="far fa-trash-alt"></i></a>
                      <a class="btn btn-outline-secondary btn-sm" href="editar_cliente?id=<?= $item['ID'] ?>" role="button"><i class="fas fa-pen"></i></a>
                    </td>

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
  function atualizarPagina() {
    window.location.href = "<?= SIS_URL_LISCLI ?>";
  }

  function cadastrarCliente() {
    window.location.href = "<?= SIS_URL_CADCLI ?>";
  }


  $(document).ready(function() {
    // var tam = $(".mask").length

    // console.log($(".mask"));
    // // console.log($(".mask").length)

    // for (i = 0; i < tam; i++) {
    //   var lng = $(".mask")[i].innerHTML;
    //   console.log(lng.length);

    //   if (lng.length <= 11) {
    //     console.log("aq1");
    //     $(".mask").mask("999.999.99-99");
    //   } else if (lng.length === 13) {
    //     console.log("aq2");
    //     $(".mask").mask("00.000.000/0000-00");
    //   }

    // }



    $(".cpf").mask("000.000.000-00");
    $(".tel").mask("(00) 0 0000-0000");
  });


  var table = $("#dataTableAll2").DataTable({
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
</script>