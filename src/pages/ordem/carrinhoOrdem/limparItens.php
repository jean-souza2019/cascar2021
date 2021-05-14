<?php
require_once '../../../../init.php';
session_start();

try {
  unset($_SESSION['carrinho']);
  unset($_SESSION['cliente']);
  unset($_SESSION['os']);
  unset($_SESSION['mensagem']);

  if ($_GET['ret'] == 1) {
    echo "<script>window.top.location.href='" . SIS_URL_LISOS . "'</script>";
  } else {
    echo "<script>window.top.location.href='" . SIS_URL_CADOS . "'</script>";
  }
} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
