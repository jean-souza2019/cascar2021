<?php

require_once 'init.php';

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();
$crd = new Crd($conexao, $dashboard);

$insert = $crd->gerarFornecedor($_POST);


if (!$insert['status_cod']) {
  echo "<script>alert('" . $insert['status_message'] . "')</script>";
  echo "<script>javascript:history.back()</script>";
  echo "<script>document.getElementById('cgccpf').value = '';</script>";
  die();
} else {
  echo "<script>alert('" . $insert['status_message'] . "')</script>";
  echo "<script>window.top.location.href='" . SIS_URL_LISFORN . "'</script>";
  die();
}


