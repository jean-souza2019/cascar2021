<?php
require_once '../../../init.php';

require('Conexao.php');
require('Autenticacao.php');


$legenda_erros = array("acesso" => "Necessário Autenticação", "erro" => "Erro ao realizar acesso");

if (!empty($_SESSION['USUARIO']) || $_SESSION['CONECTADO']) {
  header('Location: http://localhost/Cascar/index');
}

?>

<!doctype html>
<html lang="br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="<?= SIS_AUTOR ?>">
  <link rel="shortcut icon" href="<?= SIS_URL ?>src/assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?= SIS_URL ?>src/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/assets/js/bootstrap-4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/assets/js/fontawesome-free-5.7.1/css/all.min.css">

  <style>
    .panel-heading img {
      width: 70%;
      margin: 0 15% 15px 15%;
    }

    input.btn.btn-lg.btn-success.btn-block {
      background: #32338e;
    }

    body {
      height: 100%;
      background: #e6e7e9;
    }

    .panel.panel-default {
      border: 1px solid #eee;
      box-shadow: 0 0.75rem 1.5rem rgba(31, 45, 62, 0.14);
      background: #fff;
      padding: 20px 30px 50px 30px;
      margin-top: 30px;
      border-radius: 25px 0px 25px 0px;
    }

    .btnLogin {
      display: initial !important;
      width: 50% !important;
      border-radius: 10px 0px 10px 0px;
      margin-top: 20px;
    }

    .imgLogo {
      margin-top: 20px;
      margin-bottom: 20px;
    }


  </style>
  <title><?= $pagina_titulo ?></title>
</head>

<body>

  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-4" style="text-align: center;">
        <div class="panel panel-default">
          <div class="panel-heading imgLogo">
            <img src="<?= SIS_URL ?>src/assets/img/logo.png" alt="Casca Autocar">
          </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" method="POST" action="login.php">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Usuário" name="usuario" type="text">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Senha" name="senha" type="password">
                </div>
                <input class="btn btn-lg btn-success btn-block btnLogin" type="submit" value="Acessar">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="<?= SIS_URL ?>src/assets/js/jquery/jquery-3.3.1.min.js"></script>
<script src="<?= SIS_URL ?>src/assets/js/bootstrap-4.2.1/js/bootstrap.min.js"></script>
<script src="<?= SIS_URL ?>src/assets/js/acc.js?t=<?= time() ?>"></script>

</html>