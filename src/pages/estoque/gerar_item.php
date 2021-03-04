<?php

require_once '../../../init.php';

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$insert = $crd->gerarItem($_POST);


if (!$insert['status_cod']) {
  echo "<script>alert('" . $insert['status_message'] . "')</script>";
  echo "<script>javascript:history.back()</script>";
  die();
} else {
  echo "<script>alert('" . $insert['status_message'] . "')</script>";
  echo "<script>window.top.location.href='" . SIS_URL_LISEST . "'</script>";
  die();
}

