<?php
require_once('comapi.php');


class Autenticacao{
  private $usuario;
  private $senha;

  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar(BD_USUARIO, BD_SENHA);
  }

  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  public function autenticar(){
    $api = new comapi;

    echo $api->conectar($this->usuario, $this->senha);
  }


  // public static function check($pagina_atual = null, $niveis_permitidos = null) {
  public static function check(){
    //verificar niveis de acesso e se o usuário está ativo
    if (empty($_SESSION['USUARIO']) || !$_SESSION['CONECTADO']){
      header('Location: src/components/bd/pagina-login?status=acesso');
    }
  }



  public static function sair(){
    unset($_SESSION['USUARIO']);
    unset($_SESSION['CONECTADO']);
    header('Location:  pagina-login?status=logout');
  }

  public static function imprimeSessao(){
    if (!session_id()) session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
  }
}
