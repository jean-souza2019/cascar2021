<?php

class Conexao{
  private $host = BD_SERVIDOR;
  private $dbname = BD_NOME;

  private $instance;

  public function conectar($user, $pass)
  {
    try {
    
      // Utilizando padrão singleton para realizar apenas uma instância
      if (!isset($this->instance)) {
        /* Conexão */
        $conexao = mysqli_connect($this->host,$user, $pass, $this->dbname);
        $this->instance = $conexao;
        
        return $this->instance;
      } else {
        return $this->instance;
      }
    } catch (PDOException $e) {
      echo "<p>" . $e->getMessege() . "</p>";
    }
  }
}
