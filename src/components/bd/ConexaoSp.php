<?php

class ConexaoSp{
  private $host = BD_SERVIDOR;
  private $dbname = BD_NOME;
  private $user = BD_USUARIOSP;
  private $pass = BD_SENHASP;

  private $instance;

  public function conectar()
  {
    try {
      /* cria uma instancia do objeto PDO */
      $tns = "(DESCRIPTION =
          (ADDRESS_LIST =
            (ADDRESS = (PROTOCOL = TCP)(HOST = $this->host)(PORT = 1521))
          )
          (CONNECT_DATA =
            (SERVICE_NAME = $this->dbname)
          )
        )
      ";

      // Utilizando padrão singleton para realizar apenas uma instância
      if (!isset($this->instance)) {
        /* Conexão */
        $conexao = new PDO("oci:dbname=" . $tns, $this->user, $this->pass);
        /* Definindo Parâmetros */
        $conexao->exec("ALTER SESSION SET CURRENT_SCHEMA = SAPIENS");
        $conexao->exec('SET charset set utf8');

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
