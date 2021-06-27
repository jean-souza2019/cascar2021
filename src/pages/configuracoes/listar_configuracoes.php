<?php

require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();

$crd = new Crd($conexao);


// Consulta todos os registros



// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">


    <div class="col-md-12">
        <div class="card">

            <!-- Titulo -->
            <div class="card-header azulcascar">
                <h5 class="text-left">Ordens de Serviço - Gerais<span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarOrdem()">Incluir </span> </h5>
            </div>

            <div class="card-body center ">

                <div class="container-fluid">

                    <div class="col-md-12">
                        <div class="row justify-content-md-center">
                            <div class="col-md-2">
                                <div class="input-group rounded">
                                    <input id="filtro" type="text" class="form-control" placeholder="Busca Rápida" />
                                    <span class="input-group-text border-0" id="search-addon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="card text-white bg-primary card-OS onPass buscar_ordem" style="max-width: 18rem;" onclick="moveOrdem(<?= $cliente['ID'] ?>)">
                            <div class="card-header TitVerde"></div>
                            <div class="card-body ">

                                <b>
                                    <h5 class="card-title">Ordem</h5>
                                </b>
                            </div>
                        </span>

                        <span class="card text-white bg-primary card-OS onPass buscar_ordem" style="max-width: 18rem;" onclick="moveOrdem(<?= $cliente['ID'] ?>)">
                            <div class="card-header TitVerde"></div>
                            <div class="card-body ">

                                <b>
                                    <h5 class="card-title">Config. Acessos</h5>
                                </b>
                            </div>
                        </span>

                    </div>

                </div>
            </div>



            <?php
            // Incluí o cabeçalho
            include "../../components/2-footer.php";

            ?>

            <script>
                function moveOrdem(cliente) {
                    window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + cliente;
                }

                function atualizarPagina() {
                    window.location.href = "<?= SIS_URL_LISOS ?>";
                }

                function cadastrarOrdem() {
                    window.location.href = "<?= SIS_URL_CADOS ?>";
                }


                $(document).ready(function() {

                    $(".cpf").mask("000.000.000-00");
                    $(".tel").mask("(00) 0 0000-0000");


                    $(".maskNumero").mask("000.000.000", {
                        reverse: true
                    });

                });


                $(function() {
                    $("#filtro").keyup(function() {
                        var texto = $(this).val();

                        $(".buscar_ordem").each(function() {
                            var resultado = $(this).text().toUpperCase().indexOf(' ' + texto.toUpperCase());

                            if (resultado < 0) {
                                $(this).fadeOut();
                            } else {
                                $(this).fadeIn();
                            }
                        });

                    });
                });
            </script>