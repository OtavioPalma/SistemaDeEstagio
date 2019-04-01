<?php
    include("header.html");

    $test = true; // Definir como true para rodar os testes do main.js
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h2 id="nome">Otávio Messias Palma (14161000236)</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h5 class="mt-4">Dados Gerais</h5>
            <table class="table table-hover table-striped">
                <tbody>
                    <tr>
                        <th class="alinhar">Nome Completo</th>
                        <td>Otávio Messias Palma</td>
                        <th class="alinhar">Data de Nascimento</th>
                        <td>06/04/1998</td>
                    </tr>
                    <tr>
                        <th class="alinhar">CPF</th>
                        <td>123.456.789-01</td>
                        <th class="alinhar">RG</th>
                        <td>12.345.678-9</td>
                    </tr>
                    <tr>
                        <th class="alinhar">Email</th>
                        <td>larrylarry@larry.com</td>
                        <th class="alinhar">Matrícula (R.A.)</th>
                        <td>12345678901</td>
                    </tr>
                    <tr>
                        <th class="alinhar">Curso</th>
                        <td>Engenharia de Computação</td>
                        <th class="alinhar">Módulo/Ano</th>
                        <td>7/4</td>
                    </tr>
                    <tr>
                        <th class="alinhar">CEP</th>
                        <td>37700-000</td>
                        <th class="alinhar">Bairro</th>
                        <td>Centro</td>
                    </tr>
                    <tr>
                        <th class="alinhar">Endereço</th>
                        <td>Avenida Presidente João, 50</td>
                        <th class="alinhar">Complemento</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="alinhar">Estado</th>
                        <td>Minas Gerais</td>
                        <th class="alinhar">Cidade</th>
                        <td>Poços de Caldas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

    if($test) {
        echo '<div id="qunit"></div>';
        echo '<div id="qunit-fixture"></div>';
        echo '<script type="text/javascript" src="js/teste-main.js"></script>';
        echo '<script type="text/javascript" src="js/teste-cadastro.js"></script>';
    }

    include("footer.html");
?>
