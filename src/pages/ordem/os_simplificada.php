<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$OSID = $crd->getOS();
$CLIENTES = $crd->getClientes();
$PRODUTOS = $crd->getEstoque();

$os = $OSID['ID'] + 1;

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class='card card-formulario'>
                <div class="card-header azulcascar">
                    <h5 class="text-left"><a href="#" title="Cadastro Ordem Simplificada<" class="link">Cadastro Ordem Simplificada</a></h5>
                </div>

                <div class="card-body ">
                    <div class="col-md-12 ">
                        <!-- justify-content-md-center -->
                        <div class="row justify-content-md-center">

                            <!-- OS -->

                            <div class="col-md-12 mgeral50">
                                <div class="row justify-content-md-center">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">OS</span>
                                                </div>
                                                <input type="text" class="form-control" id="os" value="<?= $os ?>" name="os" readonly="true" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Cliente -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Cliente</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <!-- Telefone -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Telefone</span>
                                        </div>
                                        <input type="text" class="form-control" id="telefone" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <!-- CNPJ/CPF -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">CNPJ/CPF</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <!-- E-mail -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>


                            <!-- CEP -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">CEP</span>
                                        </div>
                                        <input type="text" class="form-control" id="CEP" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <!-- Cidade -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Cidade</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>



                            <!-- Bairro -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <!-- Endereço -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Endereço</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mgeral50">
                                <div class="row justify-content-md-center">

                                    <!-- Veiculo -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Veiculo</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Placa -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Placa</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modelo -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Modelo</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ano -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ano</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row justify-content-md-center">`
                        <div class="col-md-8">
                            <?php require_once('./carrinhoOrdem/carrinhoIndex.php');
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-md-center">
                                <div class="form-label-group">
                                    <button class="btn btn-sm btn-primary btn-registrar " onclick="gravarOs()">
                                        Finalizar
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    ?>
                </div>
            </div>
        </div>

        <?php
        // Incluí o rodapé
        include "../../components/2-footer.php";

        ?>

        <script>
            function addCli() {
                cliente = document.getElementById('cliente').value;
                $.ajax({
                    url: 'carrinhoOrdem/addCliOs.php',
                    type: 'POST',
                    data: {
                        cliente: $('#cliente').val()
                    },
                    success: function(data) {}
                });
            }

            function finalizar() {
                window.location.href = "<?= SIS_URL_FIMOS ?>?os=<?= $os ?>&cliente=<?= $_SESSION['cliente'] ?>";
            }


            $(document).ready(function() {
                $('#CEP').mask('00000-000');
                $('#telefone').mask('(00) 0 0000-0000');
            });

            function gravarOs() {
                var x = document.getElementById("telefone").value.replace(/\D/gim, '')
            }
        </script>

        <!-- https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html#callback-examples -->