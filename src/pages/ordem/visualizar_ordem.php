<?php
$Cliente = $_GET['cli'];
$Ordem = $_GET['ord'];
require_once '../../../init.php';


require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= SIS_URL ?>src/Assets/IMG/favicon.ico" type="image/x-icon">

    <title> Vistualizar Ordem</title>
</head>

<body>

</body>

</html>