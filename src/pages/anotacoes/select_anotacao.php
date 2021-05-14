<?php



require_once '../../../init.php';

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$select = $crd->buscarAnotacao($_GET['id']);

echo json_encode($select[0]);
