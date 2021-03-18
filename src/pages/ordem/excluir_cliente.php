<?php

require_once '../../../init.php';

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);



$delete = $crd->excluirCliente($_GET['id']);

if(!$delete['status_cod']){
  echo "<script>alert('".$delete['status_message']."')</script>";
  echo "<script>javascript:history.back()</script>";
  die();
}else{
  echo "<script>alert('".$delete['status_message']."')</script>";
  echo "<script>window.top.location.href='". SIS_URL_LISCLI."'</script>";
  die();
}
