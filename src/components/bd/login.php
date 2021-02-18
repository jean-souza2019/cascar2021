<?php
require_once '../../../init.php';

require('Conexao.php');
require('Autenticacao.php');

$conexao = new Conexao();

$usuario = (!empty($_POST['usuario'])) ? $_POST['usuario'] : null;
$senha = (!empty($_POST['senha'])) ? $_POST['senha'] : null;
echo ("teste11");

$autenticacao = new Autenticacao($conexao);
echo ("teste22");

$autenticacao->__set("usuario",$usuario);
$autenticacao->__set("senha",$senha);

$autenticacao->autenticar();
