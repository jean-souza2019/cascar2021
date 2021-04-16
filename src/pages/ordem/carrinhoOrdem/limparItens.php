<?php
require_once '../../../../init.php';
session_start();

try {
  unset($_SESSION['carrinho']);
  // unset($_SESSION['id']);
  unset($_SESSION['cliente']);
  unset($_SESSION['os']);
  unset($_SESSION['mensagem']);

  // echo "<script>window.top.location.href='/Carrinho'</script>";
  echo "<script>window.top.location.href='" . SIS_URL_CADOS . "'</script>";
} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
