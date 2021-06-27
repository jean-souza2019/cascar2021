<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
$crd = new Crd($conexao);

$config = $crd->getConfiguracaoOs();

// var_dump($config[0]);
// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class='card card-formulario'>
                <div class="card-header azulcascar">
                    <h5 class="text-left"><a href="#" title="Configuração OS" class="link">Configurações de OS</a></h5>
                </div>

                <div class="card-body">

                    <form class="form-cadcli" action="gerar_config_os" method="POST">
                        <div class="col-md-12">
                            <div class="row justify-content-md-center">

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-check-input" id="checktitulo" name="checktitulo" type="checkbox" <?= ($config[0]['LIS_TITULO'] === '1') ? 'checked' : '' ?>>
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $config[0]['TITULO'] ?>">


                                    </div>
                                </div>


                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-check-input" id="checkendereco" name="checkendereco" type="checkbox" <?= ($config[0]['LIS_ENDERECO'] === '1') ? 'checked' : '' ?>>
                                        <label>Endereço</label>
                                        <input class="form-control" id="endereco" name="endereco" value="<?= $config[0]['ENDERECO'] ?>">
                                    </div>
                                </div>


                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input class="form-check-input" id="checktel1" name="checktel1" type="checkbox" <?= ($config[0]['LIS_TEL1'] === '1') ? 'checked' : '' ?>>
                                        <label>Telefone 1</label>
                                        <input class="form-control" id="telefone1" name="telefone1" value="<?= $config[0]['TEL1'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input class="form-check-input" id="checktel2" name="checktel2" type="checkbox" <?= ($config[0]['LIS_TEL2'] === '1') ? 'checked' : '' ?>>
                                        <label>Telefone 2</label>
                                        <input class="form-control" id="telefone2" name="telefone2" value="<?= $config[0]['TEL2'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-check-input" id="checkemail" name="checkemail" type="checkbox" <?= ($config[0]['LIS_EMAIL'] === '1') ? 'checked' : '' ?>>
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $config[0]['EMAIL'] ?>">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class=" row">
                            <div class="col-md-12">
                                <div class="row justify-content-md-center">
                                    <div class="form-label-group">
                                        <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">
                                            SALVAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        // Incluí o rodapé
        include "../../components/2-footer.php";

        ?>

        <script>
            function salvarDados() {
                $('.form-cadcli').submit();
            }


            $(document).ready(function() {
                // Tratamento para input de telefone ser apenas número
                document.getElementById("telefone").onkeypress = function(e) {
                    var chr = String.fromCharCode(e.which);
                    if ("1234567890".indexOf(chr) < 0)
                        return false;
                };

                // Tratamento para input de cpf ser apenas número
                document.getElementById("cpfcnpj").onkeypress = function(e) {
                    var chr = String.fromCharCode(e.which);
                    if ("1234567890".indexOf(chr) < 0)
                        return false;
                };

                // Tratamento para input de Ano ser apenas número
                document.getElementById("cep").onkeypress = function(e) {
                    var chr = String.fromCharCode(e.which);
                    if ("1234567890".indexOf(chr) < 0)
                        return false;
                };

                // Tratamento para input de Cep ser apenas número
                document.getElementById("ano").onkeypress = function(e) {
                    var chr = String.fromCharCode(e.which);
                    if ("1234567890".indexOf(chr) < 0)
                        return false;
                };

            });
        </script>