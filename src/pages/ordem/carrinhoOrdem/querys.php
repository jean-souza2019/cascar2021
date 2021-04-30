<?php
class querys
{
  private $hostname;
  private $username;
  private $password;
  private $dbname;

  public function __construct()
  {
    $this->hostname = '127.0.0.1';
    $this->username = 'root';
    $this->password = '';
    $this->dbname =  'cascar';
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




  public function addItem($os, $cliente)
  {
    session_start();
    $_SESSION['mensagem'] = " ";

    $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    if (isset($_SESSION['carrinho']) && isset($_SESSION['id']) && isset($cliente) && isset($os)) {

      foreach ($_SESSION['carrinho'] as $item) {
        $query = "INSERT INTO ITENSORDENS 
        (OS,QUANTIDADE,VALOR,DATA,CLIENTE,PRODUTO) 
        VALUES (" . $os . ", " . $item['qtdItem'] . "," . $item['valorItem'] . ",'" . date("Y/m/d") . "','" . $cliente . "','" . $item['nomeItem'] . "')";

        $res = $mysqli->query($query);

        if ($res) {

          $mysqli->query("UPDATE OSID SET ID =" . $os . "WHERE ID = " . ($os - 1));

          $_SESSION['mensagem'] = "Novo registro criado com sucesso ";
        } else {
          $_SESSION['mensagem'] = "Erro ao inserir registro. ";
        }
      }
      $res2 = $mysqli->query(
        "UPDATE OSID SET ID =" . $os
      );
    }
  }
}
