<?php
class querys
{
  private $hostname;
  private $username;
  private $password;
  private $dbname;

  public function __construct()
  {
    $this->hostname = 'localhost';
    $this->username = 'root';
    $this->password = '';
    $this->dbname =  'carrinho';
  }

  public function getProdutos()
  {
    $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    $query = "SELECT ID, DESCRICAO 
                FROM PRODUTOS 
                ORDER BY ID";

    $res = $mysqli->query($query);
    $itens = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($itens as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }


  public function addItem()
  {
    session_start();
    $_SESSION['mensagem'] = " ";

    $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    if (isset($_SESSION['carrinho']) && isset($_SESSION['id']) && isset($_SESSION['cliente']) && isset($_SESSION['os'])) {
      $os = $_SESSION['os'];
      $cliente = $_SESSION['cliente'];

      foreach ($_SESSION['carrinho'] as $item) {
        $query = "INSERT INTO ITENSORDENS 
        (OS,QUANTIDADE,VALOR,DATA,CLIENTE,PRODUTO) 
        VALUES (" . $os . ", " . $item['qtdItem'] . "," . $item['valorItem'] . ",'" . date("Y/m/d") . "','" . $cliente . "','" . $item['nomeItem'] . "')";

        $res = $mysqli->query($query);

        if ($res) {
          $_SESSION['mensagem'] = "Novo registro criado com sucesso ";
        } else {
          $_SESSION['mensagem'] = "Erro ao inserir registro. ";
        }
      }
    }
  }
}
