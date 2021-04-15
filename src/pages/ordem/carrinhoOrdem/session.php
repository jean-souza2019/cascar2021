<?php
session_start();


if (isset($_SESSION['id'])) {
    $x = $_SESSION['id'];
    $x = $x + 1;
    $_SESSION['id'] = $x;
} else {
    $_SESSION['id'] = 1;
}

if (!empty($_POST['qtdItem']) && !empty($_POST['nomeItem']) && !empty($_POST['valorItem'])) {
    $_SESSION['carrinho'][$_SESSION['id']]['id'] = $_SESSION['id'];
    $_SESSION['carrinho'][$_SESSION['id']]['qtdItem'] = $_POST['qtdItem'];
    $_SESSION['carrinho'][$_SESSION['id']]['nomeItem'] = $_POST['nomeItem'];
    $_SESSION['carrinho'][$_SESSION['id']]['valorItem'] = $_POST['valorItem'];
}
