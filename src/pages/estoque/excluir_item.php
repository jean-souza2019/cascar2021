<?php

require_once '../../../init.php';

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$delete = $crd->excluirItem($_GET['item']);

if (!$delete['status_cod']) {
    echo "<script>alert('" . $delete['status_message'] . "')</script>";
    echo "<script>javascript:history.back()</script>";
    die();
} else {
    $imagem = $crd->getItemPnl($_GET['item']);
    unlink($imagem[0]['IMAGEM']);
    echo "<script>alert('" . $delete['status_message'] . "')</script>";
    echo "<script>window.top.location.href='" . SIS_URL_LISEST . "'</script>";
    die();
}
