<?php
/* Objetivo centralizar a configuração do sistema */

// Configuração do Sistema
define('SIS_URL', "http://localhost/Cascar/");

// define('SIS_URL_CADFOR', "http:/localhost/Cascar/cadastro_fornecedor");
// define('SIS_URL_LISFORN', "http:/localhost/Cascar/Outras/listar_fornecedores");
define('SIS_URL_LISCLI', "http:/localhost/Cascar/src/pages/clientes/listar_clientes");
// define('SIS_URL_EDITFORN', "http:/localhost/Cascar/editar_fornecedor");

// define('SIS_URL_CADTIPDOC', "http:/localhost/Cascar/cadastro_tipo_documento");
// define('SIS_URL_LISTIPDOC', "http:/localhost/Cascar/listar_tipo_documento");
// define('SIS_URL_EDITTIPDOC', "http:/localhost/Cascar/editar_tipo_documento");
// define('SIS_URL_UPDTIPDOC', "http:/localhost/Cascar/update_tipo_documento");

define('SIS_ATUALIZACAO', true);
define('SIS_TITULO', 'Casca Autocar');
define('SIS_AUTOR', 'Jean DEV Ti.');



$pagina_titulo = SIS_TITULO;

// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));
define('DEBUG_ERROR', FALSE);

// conexão com base de dados
define( 'BD_SERVIDOR', 'localhost' );
define( 'BD_USUARIO', 'root' );
define( 'BD_SENHA', '' );
define( 'BD_NOME', 'cascar' );

// define('BD_USUARIOSP', 'senior_readonly');
// define('BD_SENHASP', 'z87DmdX^+N');


date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', false);
if(DEBUG_ERROR){
  ini_set('display_errors', true);
  error_reporting(E_ALL);
}

function imprimir($array){
    echo "<pre>";
    print_r($array);
    echo "<pre>";
}

if(!isset($_SESSION)){
    session_start();
}

 ?>
