<?php

class Crd
{
  private $conexao;
  private $conexaoSp;

  public function __construct(Conexao $conexao)
  {
    $this->conexao = $conexao->conectar(BD_USUARIO, BD_SENHA);
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

    if ($_FILES['imagem']['name']) {
      $extensao = strtolower(substr($_FILES['imagem']['name'], 4));
      $novo_nome = md5(time()) . $extensao;
      $diretorio = "img/";

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


      if ($_FILES['imagem']['name']) {
        $tempImg = ", '" . $diretorio . $novo_nome . "' ";
        $img = ", IMAGEM";
      } else {
        $tempImg = " ";
        $img = " ";
      }
      


      $query = "INSERT INTO CASCAR.ESTOQUE (DESCRICAO, ENDERECAMENTO, VALOR, QUANTIDADE_ESTOQUE ".$img.")
             values ('" . $descricao . "', '" . $enderecamento . "', " . $valor . ", " . $quantidade_estoque . " " . $tempImg . ")";

      $objeto = mysqli_query($this->conexao, $query);
      
      if ($objeto > 0) {
        // print_r($objeto);
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Novo Registro Incluido com Sucesso!";
        return $retorno;
      } else {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Ocorreu um problema ao cadastrar o item.";
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



//********************* BUSCAR P/ LISTAR ITEM ************************
public function excluirItem($item)
{
  $retorno['status_cod'] = null;
  $retorno['status_message'] = null;
  
  $item = (!empty($item)) ? $item : null;
  
  try {
    $query = "DELETE FROM CASCAR.ESTOQUE
                  WHERE CODIGO = " . $item;

$objeto = mysqli_query($this->conexao, $query);

if ($objeto > 0) {
  // print_r($objeto);
  $retorno['status_cod'] = 1;
  $retorno['status_message'] = "Item Excluido com Sucesso!";
  return $retorno;
} else {
  $retorno['status_cod'] = 1;
  $retorno['status_message'] = "Ocorreu um problema ao excluir item.";
  return $retorno;
}
} catch (PDOException $e) {
  $retorno['status_cod'] = 0;
  $retorno['status_message'] = "Erro: " . $e->getMessage();
  return $retorno;
}
}


//********************* GERAR ITEM ************************

public function atualizarItem($dados)
{
  
  $retorno = array();
  $retorno['status_cod'] = null;
  $retorno['status_message'] = null;
  $retorno['dados'] = null;
  
  $codigo = (!empty($dados['codigo'])) ? $dados['codigo'] : null;
  $descricao = (!empty($dados['descricao'])) ? $dados['descricao'] : null;
  $enderecamento = (!empty($dados['enderecamento'])) ? $dados['enderecamento'] : null;
  $valor = (!empty($dados['valor'])) ? $dados['valor'] : null;
  $quantidade_estoque = (!empty($dados['quantidade_estoque'])) ? $dados['quantidade_estoque'] : null;
  

  if ($_FILES['imagem']['name']) {
    $extensao = strtolower(substr($_FILES['imagem']['name'], 4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "img/";
    
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
  
  }
  
  
  // Verifica se os campos obrigatórios foram preenchidos
  if (
    empty($codigo) || empty($descricao) || empty($enderecamento) || empty($valor) || empty($quantidade_estoque)
    ) {
      
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Todos os campos Obrigatórios devem ser preenchidos";
      return $retorno;
    }
    
    // Inclusão dos dados
    try {
      
      if ($_FILES['imagem']['name']) {
        $tempImg = " , IMAGEM = '" . $diretorio . $novo_nome . "' ";
      } else {
        $tempImg = " ";
      }
      
      
      $query = "UPDATE CASCAR.ESTOQUE SET DESCRICAO = '" . $descricao . "', 
      ENDERECAMENTO = '" . $enderecamento . "', 
      VALOR = " . $valor . ", 
      QUANTIDADE_ESTOQUE = " . $quantidade_estoque . $tempImg
      . " WHERE CODIGO = " . $codigo;
      
      $objeto = mysqli_query($this->conexao, $query);
      
      // echo $query;
      
      if ($objeto > 0) {
        // print_r($objeto);
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Registro atualizado com Sucesso!";
        return $retorno;
      } else {
        $retorno['status_cod'] = 1;
        $retorno['status_message'] = "Ocorreu um problema ao editar o registro.";
        return $retorno;
      }
    } catch (PDOException $e) {
      $retorno['status_cod'] = 0;
      $retorno['status_message'] = "Erro: " . $e->getMessage();
      return $retorno;
    }
  }
}
