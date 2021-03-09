<?php

class Crd
{
  private $conexao;
  private $conexaoSp;

  public function __construct(Conexao $conexao)
  {
    $this->conexao = $conexao->conectar(BD_USUARIO, BD_SENHA);
    // $this->conexaoSp = $conexao->conectar(BD_USUARIOSP, BD_SENHASP);
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








  // ##########################    CLIENTES    ##########################

  //********************* GERAR CLIENTE ************************
  public function gerarCliente($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $nome = (!empty($dados['nome'])) ? $dados['nome'] : null;
    $cpfcnpj = (!empty($dados['cpfcnpj'])) ? $dados['cpfcnpj'] : null;
    $telefone = (!empty($dados['telefone'])) ? $dados['telefone'] : null;
    $email = (!empty($dados['email'])) ? $dados['email'] : null;
    $cidade = (!empty($dados['cidade'])) ? $dados['cidade'] : null;
    $bairro = (!empty($dados['bairro'])) ? $dados['bairro'] : null;
    $cep = (!empty($dados['cep'])) ? $dados['cep'] : null;
    $veiculo = (!empty($dados['veiculo'])) ? $dados['veiculo'] : null;
    $modelo = (!empty($dados['modelo'])) ? $dados['modelo'] : null;
    $ano = (!empty($dados['ano'])) ? $dados['ano'] : null;
    $placa = (!empty($dados['placa'])) ? $dados['placa'] : null;


    // Verifica se os campos obrigatórios foram preenchidos
    if (
      empty($nome) || empty($cpfcnpj) || empty($telefone) || empty($email)
      || empty($cidade) || empty($bairro) || empty($cep) || empty($veiculo)
      || empty($modelo) || empty($ano) || empty($placa)
    ) {

      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    }

    // Inclusão dos dados
    try {
      $query = "INSERT INTO CASCAR.CLIENTES (NOME, CPFCNPJ, TELEFONE, EMAIL, CIDADE, BAIRRO, CEP, VEICULO, MODELO, ANO, PLACA)
            values ('" . $nome . "', " . $cpfcnpj . ", " . $telefone . ", '" . $email . "', '" . $cidade . "', '" . $bairro . "', " . $cep . ", '" . $veiculo . "', '" . $modelo . "', " . $ano . ", '" . $placa . "')";

      $objeto = mysqli_query($this->conexao, $query);

      if ($objeto > 0) {
        // print_r($objeto);
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Novo Registro Incluido com Sucesso!";
        return $retorno;
      } else {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Ocorreu um problema ao cadastrar novo cliente.";
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


  //********************* BUSCAR TODOS CLIENTES ************************
  public function getClientes()
  {

    $query = "SELECT ID,NOME,CPFCNPJ,CIDADE,TELEFONE 
                FROM CASCAR.CLIENTES
                  ORDER BY ID";

    $objeto = mysqli_query($this->conexao, $query);
    while ($obj = $objeto->fetch_assoc()) {
      $objetos[] = $obj;
    }
    return $objetos;
  }




  //********************* EXCLUIR CLIENTE ************************
  public function excluirCliente($id)
  {

    $id = (!empty($id)) ? $id : null;

    try {
      $query = "DELETE FROM CASCAR.CLIENTES WHERE ID = " . $id;

      $objeto = mysqli_query($this->conexao, $query);

      if ($objeto > 0) {
        // print_r($objeto);
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro excluido com Sucesso!";
        return $retorno;
      } else {
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Problema ao excluir registro.";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
    mysqli_close($this->conexao);
  }


  //********************* BUSCAR P/ EDIÇÃO CLIENTE ************************
  public function getClientePnl($id)
  {
    $id = (!empty($id)) ? $id : null;

    $query = "SELECT ID, NOME, CPFCNPJ, TELEFONE, EMAIL, CIDADE, BAIRRO, CEP, VEICULO, MODELO, ANO, PLACA
                  FROM CASCAR.CLIENTES 
                  WHERE ID = " . $id;

    $objeto = mysqli_query($this->conexao, $query);

    while ($obj = $objeto->fetch_assoc()) {
      $objetos[] = $obj;
    }
    return $objetos;
  }


  //********************* ATUALIZAR CLIENTE ************************
  public function atualizarCliente($dados)
  {
    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $nome = (!empty($dados['nome'])) ? $dados['nome'] : null;
    $id = (!empty($dados['id'])) ? $dados['id'] : null;
    $cpfcnpj = (!empty($dados['cpfcnpj'])) ? $dados['cpfcnpj'] : null;
    $telefone = (!empty($dados['telefone'])) ? $dados['telefone'] : null;
    $email = (!empty($dados['email'])) ? $dados['email'] : null;
    $cidade = (!empty($dados['cidade'])) ? $dados['cidade'] : null;
    $bairro = (!empty($dados['bairro'])) ? $dados['bairro'] : null;
    $cep = (!empty($dados['cep'])) ? $dados['cep'] : null;
    $veiculo = (!empty($dados['veiculo'])) ? $dados['veiculo'] : null;
    $modelo = (!empty($dados['modelo'])) ? $dados['modelo'] : null;
    $ano = (!empty($dados['ano'])) ? $dados['ano'] : null;
    $placa = (!empty($dados['placa'])) ? $dados['placa'] : null;


    // Verifica se os campos obrigatórios foram preenchidos
    if (
      empty($id) ||   empty($nome) || empty($cpfcnpj) || empty($telefone) || empty($email)
      || empty($cidade) || empty($bairro) || empty($cep) || empty($veiculo)
      || empty($modelo) || empty($ano) || empty($placa)
    ) {

      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    }

    // Inclusão dos dados
    try {
      $query = "UPDATE CASCAR.CLIENTES SET NOME = '" . $nome . "', CPFCNPJ = " . $cpfcnpj . ", TELEFONE = " . $telefone . ", EMAIL = '" . $email . "', CIDADE = '" . $cidade . "', 
      BAIRRO = '" . $bairro . "', CEP = " . $cep . ", VEICULO = '" . $veiculo . "', MODELO = '" . $modelo . "', ANO = " . $ano . ", PLACA = '" . $placa . "'
      WHERE ID = " . $id;

      // print_r($query);

      $objeto = mysqli_query($this->conexao, $query);

      // print_r($objeto);
      if ($objeto > 0) {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro Atualizado com Sucesso!";
        return $retorno;
      } else {

        die();
        $retorno['status_cod'] = 0;
        $retorno['status_message'] = "Ocorreu um erro ao atualizar o registro! Favor entrar em contato com o suporte";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }








  // ##########################    ESTOQUE    ##########################

  //********************* BUSCAR TODO ESTOQUE ************************
  public function getEstoque()
  {

    $query = "SELECT CODIGO, DESCRICAO, ENDERECAMENTO, VALOR, QUANTIDADE_ESTOQUE, IMAGEM
                FROM CASCAR.ESTOQUE
                  ORDER BY CODIGO";

    $objeto = mysqli_query($this->conexao, $query);
    while ($obj = $objeto->fetch_assoc()) {
      $objetos[] = $obj;
    }
    return $objetos;
  }



  //********************* GERAR ITEM ************************

  public function gerarItem($dados)
  {

    $retorno = array();
    $retorno['status_cod'] = null;
    $retorno['status_message'] = null;
    $retorno['dados'] = null;

    $descricao = (!empty($dados['descricao'])) ? $dados['descricao'] : null;
    $enderecamento = (!empty($dados['enderecamento'])) ? $dados['enderecamento'] : null;
    $valor = (!empty($dados['valor'])) ? $dados['valor'] : null;
    $quantidade_estoque = (!empty($dados['quantidade_estoque'])) ? $dados['quantidade_estoque'] : null;

    if (isset($_FILES['imagem'])) {
      $extensao = strtolower(substr($_FILES['imagem']['name'], 4));
      $novo_nome = md5(time()) . $extensao;
      $diretorio = "C:/xampp/htdocs/Cascar/img/";

      move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
    }


    // Verifica se os campos obrigatórios foram preenchidos
    if (
      empty($descricao) || empty($enderecamento) || empty($valor) || empty($quantidade_estoque)
    ) {

      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    }

    // Inclusão dos dados
    try {
      $query = "INSERT INTO CASCAR.ESTOQUE (DESCRICAO, ENDERECAMENTO, VALOR, QUANTIDADE_ESTOQUE, IMAGEM)
             values ('" . $descricao . "', '" . $enderecamento . "', " . $valor . ", " . $quantidade_estoque . ", '" . $diretorio . $novo_nome . "')";

      $objeto = mysqli_query($this->conexao, $query);

      if ($objeto > 0) {
        // print_r($objeto);
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Novo Registro Incluido com Sucesso!";
        return $retorno;
      } else {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Ocorreu um problema ao cadastrar novo cliente.";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }



  
  //********************* BUSCAR P/ LISTAR ITEM ************************
  public function getItemPnl($id)
  {
    $id = (!empty($id)) ? $id : null;

    $query = "SELECT CODIGO, DESCRICAO, ENDERECAMENTO, VALOR, QUANTIDADE_ESTOQUE, IMAGEM
                  FROM CASCAR.ESTOQUE 
                  WHERE CODIGO = " . $id;

    $objeto = mysqli_query($this->conexao, $query);

    while ($obj = $objeto->fetch_assoc()) {
      $objetos[] = $obj;
    }
    return $objetos;
  }
}
