<?php

require_once 'init.php';

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();
$crd = new Crd($conexao, $dashboard);



$delete = $crd->excluirTiposDocumentos($_GET['id']);

if(!$delete['status_cod']){
  echo "<script>alert('".$delete['status_message']."')</script>";
  echo "<script>javascript:history.back()</script>";
  die();
}else{
  echo "<script>alert('".$delete['status_message']."')</script>";
  echo "<script>window.top.location.href='". SIS_URL_LISTIPDOC."'</script>";
  die();
}
