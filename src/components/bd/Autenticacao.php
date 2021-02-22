<?php
class Autenticacao
{
  private $usuario;
  private $senha;

  public function __construct(Conexao $conexao)
  {
    $this->conexao = $conexao->conectar(BD_USUARIO, BD_SENHA);
  }

  public function __get($atributo)
  {
    return $this->$atributo;
  }

  public function __set($atributo, $valor)
  {
    $this->$atributo = $valor;
  }

  public function autenticar()
  {
    $senha =  md5($this->senha);

    $query  = "SELECT * FROM USUARIOS 
              WHERE usuario = '$this->usuario' AND SENHA = '$senha'";

    // echo $query;
    // echo ($this->senha);
    // echo $senha;

    $objeto = mysqli_query($this->conexao, $query);
    // echo($objeto->num_rows);

    $row = $objeto->fetch_assoc();
    // var_dump($row['nome']);

    // if (!empty($objeto)) {
    if ($objeto->num_rows <> 0) {
      $_SESSION['USUARIO'] = $row['nome'];
      $_SESSION['CONECTADO'] = TRUE;
      header('Location: http://localhost/cascar/index');
    } else {
      header('Location: pagina-login.php?status=erro');
    }
  }


  // public static function check($pagina_atual = null, $niveis_permitidos = null) {
  public static function check()
  {
    //verificar niveis de acesso e se o usuário está ativo
    if (empty($_SESSION['USUARIO']) || !$_SESSION['CONECTADO']) {
      header('Location: src/components/bd/pagina-login?status=acesso');
    }
  }



  public static function sair()
  {
    unset($_SESSION['USUARIO']);
    unset($_SESSION['CONECTADO']);
    header('Location:  pagina-login?status=logout');
  }

  public static function imprimeSessao()
  {
    if (!session_id()) session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
  }
}
