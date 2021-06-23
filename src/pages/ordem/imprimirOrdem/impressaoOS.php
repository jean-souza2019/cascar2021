<?php
require_once '../../../../init.php';

require('../../../components/bd/Autenticacao.php');
require('../../../components/bd/Conexao.php');
require('../../../components/bd/Crd.php');

Autenticacao::check();

$Cliente = $_GET['cli'];
$Ordem = $_GET['ord'];
$usuario = $_SESSION['USUARIO'];

$conexao = new Conexao();
$crd = new Crd($conexao);

$Clientes = $crd->getClientePnl($Cliente);
$Dados_Ordem = $crd->getOSsCliente($Cliente, $Ordem);

// Tratamento para datas
$explode = explode('-', $Dados_Ordem[0]['DATA']);
$DataOs = $explode[2] . "/" . $explode[1] . "/" . $explode[0];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar - Ordem de Serviço</title>
    <link rel="icon" href="<?= SIS_URL ?>src/Assets/IMG/favicon.ico" type="image/x-icon">
    <script src="<?= SIS_URL ?>src/Assets/js/jquery/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="margin-bottom: 15px;width: 100%;float: left;text-align: center;border: solid 1px;border-radius: 0px 20px 0px 20px;color: #4a4a4a;">

        <span style="width: 250px;float: left;text-align: center;width: 33%;margin-top: 15px;margin-bottom: 15px;">
            <!-- <img src="https://i.postimg.cc/SNdm7tZL/logoEmp.png" style="width: 250px;margin-top: 15px;" /> -->
            <img src="<?= SIS_URL ?>src/assets/img/logo.png" style="width: 200px;margin-top: 20px;">
        </span>

        <span style="width: 350px;float: left;text-align: center;width: 33%;">
            <h1>CASCA AUTOCAR</h1>
            <p> <?= SIS_ENDERECO ?></p>
            <p><?= SIS_TELEFONE1 ?> / <?= SIS_TELEFONE2 ?></p>
            <p> <?= SIS_EMAIL ?> </p>
        </span>

        <span style="width: 250px;float: left;text-align: right;width: 33%;margin-top: 15px;">
            <p> Ordem nº: <?= $Ordem ?></p>
            <p> Válido até 30/11/2020</p>
        </span>
    </div>

    <div>
        <div style="text-align: center;float: none;">
            <span style="background-color: #d0d0d0;float:left; width: 100%; height: 19px;font-size: 16px;border-radius: 0px 10px 0px 10px;text-align: center;font-weight: bold">
                DADOS
            </span>

        </div>
        <div style="text-align: center;float: none;">
            <span style="float: left;width: 40%;text-align: left;">
                <p><b style="font-size:17px">Cliente:</b> <?= $Clientes[0]['NOME'] ?></p>
                <p><b style="font-size:17px" id="telefone">Telefone:</b> <span class="telefone"><?= $Clientes[0]['TELEFONE'] ?></span></p>
                <p><b style="font-size:17px" id="cpfcnpj">CPF/CNPJ:</b>
                    <span class="cpf">
                        <?php

                        if (strlen($Clientes[0]['CPFCNPJ']) < 11) {
                            $dif = 11 - strlen($Clientes[0]['CPFCNPJ']);
                            $acrescento = 0;
                            for ($x = 1; $x < $dif; $x += 1) {
                                $acrescento = $acrescento . "0";
                            }
                            echo $acrescento . $Clientes[0]['CPFCNPJ'];
                        } elseif ((strlen($Clientes[0]['CPFCNPJ']) >= 11) and (strlen($Clientes[0]['CPFCNPJ']) < 14)) {
                            $dif = 14 - strlen($Clientes[0]['CPFCNPJ']);
                            $acrescento = 0;
                            for ($x = 1; $x < $dif; $x += 1) {
                                $acrescento = $acrescento . "0";
                            }
                            echo $acrescento . $Clientes[0]['CPFCNPJ'];
                        } else {
                            echo $Clientes[0]['CPFCNPJ'];
                        }
                        ?></span>
                </p>
                <p><b style="font-size:17px">E-mail:</b> <?= $Clientes[0]['EMAIL'] ?></p>
            </span>

            <span style="float: left;width: 38%;text-align: left;">
                <p><b style="font-size:17px">CEP:</b> <?= $Clientes[0]['CEP'] ?></p>
                <p><b style="font-size:17px">Cidade:</b> <?= $Clientes[0]['CIDADE'] ?></p>
                <p><b style="font-size:17px">Bairro:</b> <?= $Clientes[0]['BAIRRO'] ?></p>
                <p><b style="font-size:17px">Endereço:</b> <?= $Clientes[0]['ENDERECO'] ?></p>

            </span>

            <span style="    width: 22%;text-align: left;float: left">
                <p><b style="font-size:17px">Veiculo:</b> <?= $Clientes[0]['VEICULO'] ?></p>
                <p><b style="font-size:17px">Placa:</b> <?= $Clientes[0]['PLACA'] ?></p>
                <p><b style="font-size:17px">Modelo:</b> <?= $Clientes[0]['MODELO'] ?></p>
                <p><b style="font-size:17px">Ano:</b> <?= $Clientes[0]['ANO'] ?></p>

            </span>
        </div>
    </div>

    <div style="text-align: center;float: none;">
        <span style="background-color: #d0d0d0;float:left; width: 100%; height: 19px;font-size: 16px;border-radius: 0px 10px 0px 10px;text-align: center;font-weight: bold;margin-bottom: 10px;">
            ITENS
        </span>

    </div>
    <div style="text-align: center;">
        <table border="1em" style="width: 100%;float: none;text-align: center;color: #4a4a4a;">
            <tr>
                <td><b>Quantidade</b></td>
                <td><b>Valor</b></td>
                <td><b>Produto</b></td>
            </tr>
            <?php foreach ($Dados_Ordem as $item) { ?>
                <tr>
                    <td class="maskNumero"><?= $item['QUANTIDADE'] ?></td>
                    <td><?php
                        $desItem = $crd->getItemPnl($item['PRODUTO']);
                        echo ($desItem[0]['DESCRICAO']);
                        ?></td>
                    <td>R$ <span class="maskNumero"><?= $item['VALOR'] ?></span></td>

                </tr>
            <?php } ?>
        </table>
        <table style="border: solid 1px;width: 35%;float: right;text-align: center;color: #4a4a4a;background-color:#d0d0d0 ;">

            <tr>
                <td style="border: solid 1px;background-color: #f1f1f1;font-weight: bold;width: 15%">Total:</td>
                <td style="border: solid 1px;background-color: #f1f1f1;font-weight: bold;width: 20%;">R$ <span class="maskNumero"><?php
                                                                                                                                    $total = 0;
                                                                                                                                    foreach ($Dados_Ordem as $item) {
                                                                                                                                        $it = $item['VALOR'] * $item['QUANTIDADE'];
                                                                                                                                        $total = $total + $it;
                                                                                                                                    }
                                                                                                                                    echo $total; ?></span></td>
            </tr>
        </table>
    </div>
    <br>
    <hr style="margin-top: 110px;float: left;width: 100%;">
    <div>
        Ordem criada em <?= $DataOs ?>.
    </div>

</body>

</html>
<?=
include "../../../components/2-footer.php";
?>
<script>
    $(document).ready(function() {

        $(".maskNumero").mask("000.000.000", {
            reverse: true
        });
        $(".cpf").mask("000.000.000-00");
        $(".telefone").mask("(00) 0 0000-0000");
    });
</script>