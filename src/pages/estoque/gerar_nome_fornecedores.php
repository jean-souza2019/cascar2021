<?php

require_once 'init.php';

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();
$crd = new Crd($conexao, $dashboard);

$select = $crd->getFornecedoresSenior($_GET['cod']);
// print_r($select);
foreach ($select as $sel) {echo ($sel->NOMFOR) ;}