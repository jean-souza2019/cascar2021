<?php
/* Objetivo centralizar a configuração do sistema */

// Configuração do Sistema
define('SIS_URL', "http://localhost/Cascar2021/");

define( 'SIS_URL_IMG', SIS_URL . "src/assets/img/produto-sem-img.png");

define('SIS_URL_LISEST', SIS_URL."src/pages/estoque/listar_estoque");
define('SIS_URL_CADITEM', SIS_URL."src/pages/estoque/cadastro_item");
define('SIS_URL_LISITEM', SIS_URL."src/pages/estoque/item");
define('SIS_URL_EDITITEM', SIS_URL."src/pages/estoque/editar_item");
define('SIS_URL_EXCLITEM', SIS_URL . "src/pages/estoque/excluir_item");

define('SIS_URL_CADCLI', SIS_URL."src/pages/clientes/cadastro_cliente");
define('SIS_URL_LISCLI', SIS_URL."src/pages/clientes/listar_clientes");
define('SIS_URL_EDITCLI', SIS_URL."src/pages/clientes/editar_cliente");

define('SIS_URL_LISOS', SIS_URL . "src/pages/ordem/listar_ordens");
define('SIS_URL_LISORD', SIS_URL . "src/pages/ordem/listar_ordem");
define('SIS_URL_LISOSCLI', SIS_URL . "src/pages/ordem/listar_ordens_cliente");
define('SIS_URL_CADOS', SIS_URL . "src/pages/ordem/cadastro_ordem");

define('SIS_URL_CONANOTA', SIS_URL . "src/pages/anotacoes/consulta_anotacao");

define('SIS_URL_FIMOS', SIS_URL . "src/pages/ordem/carrinhoOrdem/model_ins_carrinho");


define('SIS_ATUALIZACAO', true);
define('SIS_TITULO', 'Casca Autocar');
define('SIS_AUTOR', 'Jean DEV it.');



$pagina_titulo = SIS_TITULO;

// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));
define('DEBUG_ERROR', FALSE);

// conexão com base de dados
define( 'BD_SERVIDOR', "127.0.0.1" );
define( 'BD_USUARIO', 'root' );
define( 'BD_SENHA', '' );
define( 'BD_NOME', 'cascar' );


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
