<?php
require_once '../../../../init.php';

require('../../../components/bd/Conexao.php');
require('../../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);


$select = $crd->getItemPnl($_GET['cod']);
foreach ($select as $sel) {echo ($sel['VALOR']) ;}