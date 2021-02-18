<?php

class Crd
{
  private $conexao;
  private $conexaoSp;

  public function __construct(Conexao $conexao, Dashboard $dashboard)
  {
    $this->conexao = $conexao->conectar(BD_USUARIO, BD_SENHA);;
    $this->conexaoSp = $conexao->conectar(BD_USUARIOSP, BD_SENHASP);;
    $this->dashboard = $dashboard;
  }

  //********************* GERAR TIPO DOCUMENTO ************************
  public function gerarTipoDocumento($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $descricao = (!empty($dados['desdoc'])) ? $dados['desdoc'] : null;
    $validade = (!empty($dados['diaval'])) ? $dados['diaval'] : null;
    $situacao = (!empty($dados['sittip'])) ? $dados['sittip'] : null;

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($descricao) || empty($validade) || empty($situacao)) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    } elseif ($validade <= 0) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Validade precisa ser maior que 0.";
      return $retorno;
    }
    // Inclusão dos dados
    try {
      $query = "INSERT INTO PAINEL_TI.C089DOC (CODDOC, DESTIP, DIAVAL, SITTIP)
            values (PAINEL_TI.seq_C089DOC_CODDOC.nextval, :descricao, :validade, :situacao)";

      $stmt = $this->conexao->prepare($query);
      $stmt->execute(['descricao' => $descricao, 'validade' => $validade, 'situacao' => $situacao]);

      echo $stmt->rowCount();
      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Novo Registro Incluido com Sucesso!";
        return $retorno;
      } else {
        // echo $query; 
        die();
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Ocorreu algum erro ao realizar o insert! Favor entrar em contato com a equipe de TI";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }

  //********************* BUSCAR TIPOS DE DOCUMENTOS ************************
  public function getTiposDocumentos()
  {

    $query = "SELECT CODDOC,DESTIP,DIAVAL,SITTIP 
                FROM PAINEL_TI.C089DOC 
                  ORDER BY CODDOC";

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }

    return $array;
  }



  //********************* EXCLUIR TIPOS DE DOCUMENTOS ************************
  public function excluirTiposDocumentos($id)
  {

    $id = (!empty($id)) ? $id : null;

    try {
      $query = "DELETE FROM PAINEL_TI.C089DOC WHERE CODDOC = :id";

      $stmt = $this->conexao->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro Excluido com Sucesso!";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }


  //********************* BUSCAR P/ EDIÇÃO TIPOS DE DOCUMENTOS ************************
  public function getEditTiposDocumentos($id)
  {

    $id = (!empty($id)) ? $id : null;

    $query = "SELECT coddoc,DESTIP,DIAVAL,SITTIP 
                FROM PAINEL_TI.C089DOC 
                WHERE CODDOC = :id";

    $stmt = $this->conexao->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }


  //********************* ATUALIZAR TIPO DOCUMENTO ************************
  public function atualizarTipoDocumento($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $coddoc = (!empty($dados['coddoc'])) ? $dados['coddoc'] : null;
    $descricao = (!empty($dados['desdoc'])) ? $dados['desdoc'] : null;
    $validade = (!empty($dados['diaval'])) ? $dados['diaval'] : null;
    $situacao = (!empty($dados['sittip'])) ? $dados['sittip'] : null;

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($coddoc) || empty($descricao) || empty($validade) || empty($situacao)) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    } elseif ($validade <= 0) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Validade precisa ser maior que 0.";
      return $retorno;
    }

    // Inclusão dos dados
    try {
      $query = "UPDATE PAINEL_TI.C089DOC SET DESTIP = :descricao, DIAVAL = :validade, SITTIP = :situacao
            WHERE CODDOC = :codigo";

      $stmt = $this->conexao->prepare($query);
      $stmt->execute(['descricao' => $descricao, 'validade' => $validade, 'situacao' => $situacao, 'codigo' => $coddoc]);

      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro Atualizado com Sucesso!";
        return $retorno;
      } else {

        die();
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Ocorreu um erro ao atualizar o registro! Favor entrar em contato com a equipe de TI";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }








  // ##########################    FORNECEDORES    ##########################

  //********************* GERAR FORNECEDOR ************************
  public function gerarFornecedor($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $cnpj = (!empty($dados['cgccpf'])) ? $dados['cgccpf'] : null;
    $codigo = (!empty($dados['codfor'])) ? $dados['codfor'] : null;
    $nome = (!empty($dados['nomfor'])) ? $dados['nomfor'] : null;
    $situacao = (!empty($dados['sitfor'])) ? $dados['sitfor'] : null;
    // echo $codigo;
    // echo $nome;
    // echo $situacao;

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($codigo) || empty($nome) || empty($situacao) || empty($cnpj)) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    } //elseif ($nome <= 0) {
    //   $retorno['status_cod'] = 0;
    //   $retorno['status_message'] = "Validade precisa ser maior que 0.";
    //   return $retorno;
    //}


    // Inclusão dos dados
    try {
      $query = "INSERT INTO PAINEL_TI.C095FOR (CGCCPF,CODFOR, NOMFOR, SITFOR)
            values (:cnpj, :codigo, :nome, :situacao)";

      $stmt = $this->conexao->prepare($query);
      $stmt->execute(['cnpj' => $cnpj, 'codigo' => $codigo, 'nome' => $nome, 'situacao' => $situacao]);

      // echo $stmt->rowCount();
      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Novo Registro Incluido com Sucesso!";
        return $retorno;
      } else {
        // echo $query; 
        // die();
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Já existe um fornecedor cadastrado com esse CNPJ";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }








  //********************* BUSCAR SENIOR P/ INCLUIR FORNECEDORES ************************
  public function getFornecedoresSenior($cod)
  {
    $cod = (!empty($cod)) ? $cod : null;

    $query = "SELECT NOMFOR 
                FROM SAPIENS.E095FOR 
                WHERE SITFOR = 'A'
                AND CGCCPF = :cod
                ORDER BY CODFOR";

    $stmt = $this->conexaoSp->prepare($query);
    $stmt->bindParam(':cod', $cod);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }



  //********************* BUSCAR P/ EDIÇÃO FORNECEDORES ************************
  public function getFornecedoresPnl($id)
  {
    $id = (!empty($id)) ? $id : null;

    $query = "SELECT CODFOR,NOMFOR,CGCCPF,SITFOR 
                FROM PAINEL_TI.C095FOR
                WHERE CODFOR = :id
                ORDER BY CODFOR";

    // echo($query);

    $stmt = $this->conexao->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }




  //********************* Código senior ************************
  public function getCodFornecedoresSenior($cod)
  {
    $cod = (!empty($cod)) ? $cod : null;

    $query = "SELECT CODFOR 
                FROM SAPIENS.E095FOR 
                WHERE SITFOR = 'A'
                AND CGCCPF = :cod
                ORDER BY CODFOR";

    $stmt = $this->conexaoSp->prepare($query);
    $stmt->bindParam(':cod', $cod);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }


  //********************* BUSCAR TODOS FORNECEDORES ************************
  public function getFornecedores()
  {

    $query = "SELECT CODFOR,NOMFOR,CGCCPF,SITFOR 
                FROM PAINEL_TI.C095FOR
                  ORDER BY CODFOR";

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }

    return $array;
  }

  //********************* ATUALIZAR FORNECEDOR ************************
  public function atualizarFornecedor($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $documento = (!empty($dados['cgccpf'])) ? $dados['cgccpf'] : null;
    $codigo = (!empty($dados['codfor'])) ? $dados['codfor'] : null;
    $nome = (!empty($dados['nomfor'])) ? $dados['nomfor'] : null;
    $situacao = (!empty($dados['sitfor'])) ? $dados['sitfor'] : null;

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($documento) || empty($codigo) || empty($nome) || empty($situacao)) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    }

    // Inclusão dos dados
    try {
      $query = "UPDATE PAINEL_TI.C095FOR SET SITFOR = :situacao WHERE CGCCPF = :documento AND CODFOR = :codigo";

      $stmt = $this->conexao->prepare($query);
      $stmt->execute(['situacao' => $situacao, 'documento' => $documento, 'codigo' => $codigo]);

      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro Atualizado com Sucesso!";
        return $retorno;
      } else {

        die();
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Ocorreu um erro ao atualizar o registro! Favor entrar em contato com a equipe de TI";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }


  //********************* EXCLUIR FORNECEDOR ************************
  public function excluirFornecedor($id)
  {

    $id = (!empty($id)) ? $id : null;

    try {
      $query = "DELETE FROM PAINEL_TI.C095FOR WHERE CODFOR = :id";

      $stmt = $this->conexao->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      if ($stmt->rowCount()) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro Excluido com Sucesso!";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }




}
