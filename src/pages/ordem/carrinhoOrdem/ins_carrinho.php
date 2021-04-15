<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'carrinho');
if (isset($_SESSION['carrinho']) && isset($_SESSION['id']) && isset($_SESSION['cliente']) && isset($_SESSION['os'])) {
    $os = $_SESSION['os'];
    $cliente = $_SESSION['cliente'];

    foreach ($_SESSION['carrinho'] as $item) {
        $query = "INSERT INTO ITENSORDENS 
        (OS,QUANTIDADE,VALOR,DATA,CLIENTE,PRODUTO) 
        VALUES (" . $os . ", " . $item['qtdItem'] . "," . $item['valorItem'] . ",'" . date("Y/m/d") . "','" . $cliente . "','" . $item['nomeItem'] . "')";

        $res = $mysqli->query($query);

        if ($res) {
            echo "Novo registro criado com sucesso ";
        } else {
            echo "Erro ao inserir registro. ";
        }
    }
}
