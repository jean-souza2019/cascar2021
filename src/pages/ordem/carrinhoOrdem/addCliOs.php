<?php
session_start();

// var_dump($_POST);

if (!empty($_POST['cliente'])) {
    $_SESSION['cliente'] = $_POST['cliente'];
}