<?php

session_start();

$id = $_GET['id'];

try {
  unset($_SESSION['carrinho'][$id]);

  echo "<script>window.top.location.href='/Carrinho'</script>";
} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
