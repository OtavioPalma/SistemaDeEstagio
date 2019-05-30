<?php

include_once("../conexao.php");

session_start();

$raAluno = $_SESSION['ra'];

$query = "SELECT * FROM alunos WHERE ra = $raAluno";
if ($result = $conexao->query($query)) {
    $resultado = $result->fetch_assoc();
    
    if (empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
        header("Location: ../login.php");
    } else {
        $nomeAluno = $resultado["nome"];
        $cursoAluno = $resultado["curso"];
        $periodoAnoAluno = $resultado["periodoAno"];
        $modalidadeAluno = $resultado["modalidade"];
        $idEmpresa = $resultado["idEmpresa"];
        $idEstagio = $resultado["idEstagio"];
    }
}

$query = "SELECT * FROM concedentes WHERE idEmpresa = $idEmpresa";
if ($result = $conexao->query($query)) {
    $resultado = $result->fetch_assoc();

    if(empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
        header("Location: ../login.php");
    } else {
        $nomeEmpresa = $resultado["nome"];
    }
}

$query = "SELECT * FROM estagio WHERE idEstagio = $idEstagio";
if ($result = $conexao->query($query)) {
    $resultado = $result->fetch_assoc();

    if(empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
        header("Location: ../login.php");
    } else {
        $dataInicioAno = $resultado["dataInicial"];
        $dataInicialEstagio = date("d/m/Y", strtotime($dataInicioAno));
        $dataFimAno = $resultado["dataFinal"];
        $dataFinalEstagio = date("d/m/Y", strtotime($dataFimAno));
    }
}

// reference the Dompdf namespace
use Dompdf\Dompdf;

// include autoloader
require_once 'HTML/dompdf/autoload.inc.php';

/* Cria a instância */
$dompdf = new DOMPDF();

$string = '<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <style type="text/css">
        <!-- span.cls_003 {
            font-family: Times, serif;
            font-size: 8.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        div.cls_003 {
            font-family: Times, serif;
            font-size: 8.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        span.cls_004 {
            font-family: Times, serif;
            font-size: 9.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        div.cls_004 {
            font-family: Times, serif;
            font-size: 9.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        span.cls_009 {
            font-family: Times, serif;
            font-size: 9.1px;
            color: rgb(0, 0, 127);
            font-weight: normal;
            font-style: normal;
            text-decoration: underline
        }

        div.cls_009 {
            font-family: Times, serif;
            font-size: 9.1px;
            color: rgb(0, 0, 127);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        span.cls_006 {
            font-family: Times, serif;
            font-size: 12.1px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        div.cls_006 {
            font-family: Times, serif;
            font-size: 12.1px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        span.cls_007 {
            font-family: Times, serif;
            font-size: 10.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        div.cls_007 {
            font-family: Times, serif;
            font-size: 10.1px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        span.cls_008 {
            font-family: Times, serif;
            font-size: 10.1px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        div.cls_008 {
            font-family: Times, serif;
            font-size: 10.1px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        -->
    </style>
    <script type="text/javascript"
        src="HTML/frequenciaEstagio/wz_jsgraphics.js"></script>
</head>

<body>
    <div
        style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:842px;border-style:outset;overflow:hidden">
        <div style="position:absolute;left:0px;top:0px">
            <img src="HTML/frequenciaEstagio/background1.jpg"
                width=595 height=842></div>
        <div style="position:absolute;left:244.90px;top:93.90px" class="cls_003"><span class="cls_003">MINISTÉRIO DA
                EDUCAÇÃO</span></div>
        <div style="position:absolute;left:182.30px;top:103.10px" class="cls_003"><span class="cls_003">SECRETARIA DE
                EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</span></div>
        <div style="position:absolute;left:71.80px;top:112.30px" class="cls_003"><span class="cls_003">INSTITUTO FEDERAL
                DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SUL DE MINAS GERAIS - CAMPUS POÇOS DE CALDAS</span></div>
        <div style="position:absolute;left:124.60px;top:121.40px" class="cls_004"><span class="cls_004">Avenida Dirce
                Pereira Rosa, 300 - Jardim Esperança - CEP 37703-100 - Poços de Caldas (MG)</span></div>
        <div style="position:absolute;left:168.80px;top:131.70px" class="cls_004"><span class="cls_004">Fone: (35)
                3713-5120 / (35) 3722-0598 / </span><A
                HREF="http://www.pcs.ifsuldeminas.edu.br/">www.pcs.ifsuldeminas.edu.br</A> </span></div>
        <div style="position:absolute;left:206.40px;top:148.80px" class="cls_006"><span class="cls_006">FREQUÊNCIA DE
                ESTÁGIO</span></div>
        <div style="position:absolute;left:470.50px;top:162.60px" class="cls_006"><span class="cls_006">FOLHA Nº
                ______</span></div>
        <div style="position:absolute;left:25.40px;top:186.20px" class="cls_007"><span class="cls_007">Nome do(a)
                Estagiário(a): </span><b>'.$nomeAluno.'</b></div>
        <div style="position:absolute;left:25.40px;top:210.20px" class="cls_007"><span class="cls_007">Curso:</span><br/><b>'.$cursoAluno.'</b></div>
        <div style="position:absolute;left:288.80px;top:210.20px" class="cls_007"><span class="cls_007">Módulo/Ano:</span><br/><b>'.$periodoAnoAluno.'</b></div>
        <div style="position:absolute;left:362.90px;top:210.20px" class="cls_007"><span class="cls_007">Modalidade:</span><br/><b>'.$modalidadeAluno.'</b></div>
        <div style="position:absolute;left:25.40px;top:239.90px" class="cls_007"><span class="cls_007">Empresa: </span><b>'.$nomeEmpresa.'</b></div>
        <div style="position:absolute;left:288.80px;top:239.90px" class="cls_007"><span class="cls_007">Período do estágio: </span><b>'.$dataInicialEstagio.'</b> a <b>'.$dataFinalEstagio.'</b></div>
        <div style="position:absolute;left:77.90px;top:281.60px" class="cls_008"><span class="cls_008">Presença</span></div>
        <div style="position:absolute;left:237.00px;top:291.40px" class="cls_008"><span class="cls_008">Setor</span></div>
        <div style="position:absolute;left:393.90px;top:291.40px" class="cls_008"><span class="cls_008">Atividade desenvolvida</span></div>
        <div style="position:absolute;left:52.80px;top:301.50px" class="cls_008"><span class="cls_008">Data</span></div>
        <div style="position:absolute;left:119.50px;top:301.50px" class="cls_008"><span class="cls_008">Carga horária</span></div>
        <div style="position:absolute;left:43.50px;top:715.80px" class="cls_008"><span class="cls_008">TOTAL DE</span></div>
        <div style="position:absolute;left:50.70px;top:726.00px" class="cls_008"><span class="cls_008">HORAS</span></div>
        <div style="position:absolute;left:226.80px;top:753.40px" class="cls_008"><span class="cls_008">Data:</span><span class="cls_007"> ______/______/__________</span></div>
        <div style="position:absolute;left:150.30px;top:784.80px" class="cls_007"><span class="cls_007">___________________________________________________________</span></div>
        <div style="position:absolute;left:204.00px;top:796.30px" class="cls_008"><span class="cls_008">Assinatura do(a) Supervisor(a) Responsável</span></div>
    </div>

</body>

</html>';

/* Carrega seu HTML */
$dompdf->load_html($string);

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);

?>