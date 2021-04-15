<?php

require('querys.php');

$query = new querys();

$insert = $query->addItem();

unset($_SESSION['carrinho']);
unset($_SESSION['id']);
unset($_SESSION['cliente']);
unset($_SESSION['os']);
unset($_SESSION['mensagem']);
echo "<script>javascript:history.back()</script>";
