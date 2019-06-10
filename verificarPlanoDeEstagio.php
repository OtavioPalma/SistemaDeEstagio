<?php

session_start();
include_once("conexao.php");

if (!((isset($_SESSION['ra']) && $_SESSION['ra'] != "") && (isset($_SESSION['nome']) && $_SESSION['nome'] != "") && (isset($_SESSION['senha']) && $_SESSION['senha'] != ""))) {
    header("Location: login.php");
} else {

    include("header.php");

    $flag = 0;
    $orientador = "";
    $supervisor = "";
    $concedentes = "";
    $alunos = "";
    $flagGlobal = 0;


    //aluno
    $query = "SELECT * FROM alunos WHERE ra='" . $_SESSION['ra'] . "'";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();

        if (empty($resultado)) {
            $alunos = "Por favor preencher os dados do Aluno. <br />\n";
            $flagGlobal = 1;
        } else {
            $alunos = "Por favor preencher os seguintes dados do Aluno: ";
            if ($resultado["nome"] != "") { } else {
                $alunos = $alunos . "nome";
                $flag = 1;
            }
            if ($resultado["rg"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "RG";
                $flag = 1;
            }
            if ($resultado["cpf"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "CPF";
                $flag = 1;
            }
            if ($resultado["cidade"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "cidade";
                $flag = 1;
            }
            if ($resultado["bairro"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "bairro";
                $flag = 1;
            }
            if ($resultado["uf"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "UF";
                $flag = 1;
            }
            if ($resultado["telefoneCelular"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "telefone";
                $flag = 1;
            }
            if ($resultado["cep"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "CEP";
                $flag = 1;
            }
            if ($resultado["endereco"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "endereço";
                $flag = 1;
            }
            if ($resultado["numero"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "numero";
                $flag = 1;
            }
            if ($resultado["curso"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "curso";
                $flag = 1;
            }
            if ($resultado["campus"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "campus";
                $flag = 1;
            }
            if ($resultado["email"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "email";
                $flag = 1;
            }
            /*
            if ($resultado["complemento"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "complemento";
                $flag = 1;
            }
            */
            if ($resultado["dataNascimento"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "data de nascimento";
                $flag = 1;
            }
            if ($resultado["periodoAno"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "periodo/ano";
                $flag = 1;
            }
            if ($resultado["modalidade"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "modalidade";
                $flag = 1;
            }
            if ($resultado["idSupervisor"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "idSupervisor";
                $flag = 1;
            }
            if ($resultado["idOrientador"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "idOrientador";
                $flag = 1;
            }
            if ($resultado["idEstagio"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "idEstagio";
                $flag = 1;
            }
            if ($resultado["idEmpresa"] == "") {
                if ($flag == 1) $alunos = $alunos . ", ";
                $alunos = $alunos . "idEmpresa";
                $flag = 1;
            }
            if ($flag == 1) {
                $alunos = $alunos . ". <br />\n";
                $flagGlobal = 1;
            } else {
                $alunos = "";
            }
            $flag = 0;
        }
    }

    // Orientador
    if ((isset($_SESSION['idOrientador']) && $_SESSION['idOrientador'] != "")) {
        $query = "SELECT * FROM orientador WHERE idOrientador=" . $_SESSION['idOrientador'] . "";

        if ($result = $conexao->query($query)) {
            $resultado = $result->fetch_assoc();

            if (empty($resultado)) {
                $orientador = "Por favor preencher os dados do Orientador. <br />\n";
                $flagGlobal = 1;
            } else {
                $orientador = "Por favor preencher os seguintes dados do Orientador: ";


                if ($resultado["nome"] == "") {
                    $flag = 1;
                    $orientador = $orientador . "nome";
                }
                if ($resultado["telefone"] == "") {
                    if ($flag == 1) $orientador = $orientador . ", telefone";
                    else $orientador = $orientador . "telefone";
                    $flag = 1;
                }
                if ($resultado["email"] == "") {
                    if ($flag == 1) $orientador = $orientador . ", email";
                    else $orientador = $orientador . "email";
                    $flag = 1;
                }
                if ($flag == 1) {
                    $orientador = $orientador . ".<br />\n";
                    $flagGlobal = 1;
                } else {
                    $orientador = "";
                }
                $flag = 0;
            }
        }
    }

    // Concedente
    $query = "SELECT * FROM concedentes WHERE idEmpresa=" . $_SESSION['idEmpresa'] . "";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();

        if (empty($resultado)) {
            $concedentes = "Por favor preencher os dados do Concedente. <br />\n";
            $flagGlobal = 1;
        } else {
            $concedentes = "Por favor preencher os seguintes dados do Concedente: ";
            if ($resultado["nome"] != "") { } else {
                $concedentes = $concedentes . "nome";
                $flag = 1;
            }
            if ($resultado["telefone"] != "") { } else {
                if ($flag == 1) $concedentes = $concedentes . ", ";
                $concedentes = $concedentes . "telefone";
                $flag = 1;
            }
            if ($resultado["email"] != "") { } else {
                if ($flag == 1) $concedentes = $concedentes . ", ";
                $concedentes = $concedentes . "email";
                $flag = 1;
            }
            if ($flag == 1) {
                $concedentes = $concedentes . ". <br />\n";
                $flagGlobal = 1;
            } else {
                $concedentes = "";
            }
            $flag = 0;
        }
    }

    // Supervisor
    $query = "SELECT * FROM supervisor WHERE idSupervisor=" . $_SESSION['idSupervisor'] . "";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();

        if (empty($resultado)) {
            $supervisor = "Por favor preencher os dados do Supervisor de estágio. <br />\n";
            $flagGlobal = 1;
        } else {
            $supervisor = "Por favor preencher os seguintes dados do Supervisor: ";
            if ($resultado["nome"] != "") { } else {
                $supervisor = $supervisor . "nome";
                $flag = 1;
            }
            if ($resultado["telefone"] != "") { } else {
                if ($flag == 1) $supervisor = $supervisor . ", telefone";
                else $supervisor = $supervisor . "telefone";
                $flag = 1;
            }
            if ($resultado["email"] != "") { } else {
                if ($flag == 1) $supervisor = $supervisor . ", email";
                else $supervisor = $supervisor . "email";
                $flag = 1;
            }
            if ($resultado["cpf"] != "") { } else {
                if ($flag == 1) $supervisor = $supervisor . ", cpf";
                else $supervisor = $supervisor . "cpf";
                $flag = 1;
            }
            if ($resultado["cursoFormacao"] != "") { } else {
                if ($flag == 1) $supervisor = $supervisor . ", curso de formação";
                else $supervisor = $supervisor . "curso de formação";
                $flag = 1;
            }
            if ($resultado["possuiExperiencia"] != "") { } else {
                if ($flag == 1) $supervisor = $supervisor . ", possui experiência";
                else $supervisor = $supervisor . "possui experiência";
                $flag = 1;
            }
            if ($flag == 1) {
                $supervisor = $supervisor . ". <br />\n";
                $flagGlobal = 1;
            } else {
                $supervisor = "";
            }
            $flag = 0;
        }
    }

    // Estágio
    $query = "SELECT * FROM estagio WHERE idEstagio=" . $_SESSION['idEstagio'] . "";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        if (empty($resultado)) {
            $estagio = "Por favor preencher os dados do estágio. <br />\n";
            $flagGlobal = 1;
        } else {
            $estagio = "Por favor preencher os seguintes dados do Estagio: ";
            if ($resultado["atividadesQueSeraoDesenvolvidas"] != "") { } else {
                $estagio = $estagio . "atividades a serem desenvolvidas";
                $flag = 1;
            }
            if ($resultado["areasConhecimento"] != "") { } else {
                if ($flag == 1) $estagio = $estagio . ", áreas de conhecimento envolvidas no estágio";
                else $estagio = $estagio . "áreas de conhecimento envolvidas no estágio";
                $flag = 1;
            }
            if ($resultado["objetivos"] != "") { } else {
                if ($flag == 1) $estagio = $estagio . ", objetivos a serem alcançados no estágio";
                else $estagio = $estagio . "objetivos a serem alcançados no estágio";
                $flag = 1;
            }
            if ($resultado["dataInicial"] != "") { } else {
                if ($flag == 1) $estagio = $estagio . ", data de início";
                else $estagio = $estagio . "data de início";
                $flag = 1;
            }
            if ($resultado["dataFinal"] != "") { } else {
                if ($flag == 1) $estagio = $estagio . ", data de término";
                else $estagio = $estagio . "data de término";
                $flag = 1;
            }
            if ($flag == 1) {
                $estagio = $estagio . ". <br />\n";
                $flagGlobal = 1;
            } else {
                $estagio = "";
            }
            $flag = 0;
        }
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <h5 id="nome">
                    Ops, encontramos um problema!<br />
                </h5>
                Alguns dados estão faltando para que seja possível gerar o PDF do plano de estágio. Preencha os dados listados abaixo: <br />
                <?php
                if ($flagGlobal == 1) {
                    echo $alunos;
                    echo $orientador;
                    echo $supervisor;
                    echo $concedentes;
                    echo $estagio;
                    ?>
                    <a href="formulario.php"><button type="button" class="btn btn-primary mt-5">Ir para o formulário</button></a>
                <?php
            } else {
                ?>
                    <script>
                        window.open('PDFs/planoEstagio.php', '_blank');
                    </script>
                    <script>
                        window.open('home.php', '_self');
                    </script>
                <?php
            } ?>
            </div>
        </div>
    </div>

<?php
}
include("footer.html");
?>