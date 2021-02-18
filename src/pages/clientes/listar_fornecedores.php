<?php

require_once 'init.php';

require('Components/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Fila.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();

$fila = new Fila($conexao, $dashboard);
$crd = new Crd($conexao, $dashboard);


// Consulta todos os registros
$objetos = $crd->getFornecedores();

// Incluí o cabeçalho
include "1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <h5 class="text-left">Fornecedores <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarFornecedor()">Incluir </span> </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered thead-light data-table" id="dataTableAll" width="100%" cellspacing="0">
            <thead>
              <tr style="background: #ffffff; color: #5f5f5f;">
                <!-- <th scope="col">ID</th> -->
                <th scope="col" style="text-align:center">Código</th>
                <th scope="col" style="text-align:left">Nome</th>
                <th scope="col" style="text-align:center">CNPJ</th>
                <th scope="col" style="text-align:center">Situação</th>
                <th scope="col" style="text-align:center">Opções</th>

              </tr>
            </thead>
            <tbody>
              <?php if (!empty($objetos)) { ?>
                <?php foreach ($objetos as $item) { ?>
                  <tr>

                    <td style="text-align:center;width: 5%;"><?= $item->CODFOR ?></td>
                    <td style="text-align:left; width: 45%;"><?= $item->NOMFOR ?></td>
                    <td style="text-align:center; width: 10%;" class="mask"><?= $item->CGCCPF ?></td>
                    <td style="text-align:center; width: 10%;"><?= $item->SITFOR == 'A' ? 'Ativo' : 'Inativo' ?></td>

                    <td style="text-align:center; width: 5%;" class=" btn-acoes">
                      <a class="btn btn-outline-danger btn-sm" href="excluir_fornecedor?id=<?= $item->CODFOR ?>" role="button"><i class="far fa-trash-alt"></i></a>
                      <a class="btn btn-outline-secondary btn-sm" href="editar_fornecedor?id=<?= $item->CODFOR ?>" role="button"><i class="fas fa-pen"></i></a>
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
include "2-footer.php";
?>

<script>
  function atualizarPagina() {
    window.location.href = "<?= SIS_URL_LISFORN ?>";
  }

  function cadastrarFornecedor() {
    window.location.href = "<?= SIS_URL_CADFOR ?>";
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



    // $(".mask").mask("00.000.000/0000-00");
  });
</script>