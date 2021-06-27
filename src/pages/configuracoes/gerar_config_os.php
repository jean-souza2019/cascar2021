<?php

require_once '../../../init.php';

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$update = $crd->atualizarConfiguracaoOs($_POST);


if (!$update['status_cod']) {
    echo "<script>alert('" . $update['status_message'] . "')</script>";
    echo "<script>javascript:history.back()</script>";
    die();
} else {
    echo "<script>alert('" . $update['status_message'] . "')</script>";
    echo "<script>window.top.location.href='" . SIS_URL_CFGOS . "'</script>";
    die();
}
