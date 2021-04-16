<?php
require_once '../../../../init.php';
session_start();

$id = $_GET['id'];

try {
  unset($_SESSION['carrinho'][$id]);

  echo "<script>window.top.location.href='". SIS_URL_CADOS ."'</script>";

} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
