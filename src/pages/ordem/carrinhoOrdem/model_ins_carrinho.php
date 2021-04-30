<?php
require_once '../../../../init.php';
$os = $_GET['os'];
$cliente = $_GET['cliente'];

require('querys.php');

$query = new querys();

$insert = $query->addItem($os, $cliente);
echo '<script>window.location.href = "./limparItens"</script>';
