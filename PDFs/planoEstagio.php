<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;

// include autoloader
require_once 'HTML/dompdf/autoload.inc.php';


/* Cria a instância */
$dompdf = new DOMPDF();


/* Carrega seu HTML */
$dompdf->load_html('<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
<!--
span.cls_003{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_004{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_004{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_007{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: underline}
div.cls_007{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
-->
</style>
<script type="text/javascript" src="HTML/planoEstagio/wz_jsgraphics.js"></script>
</head>
<body>
<div style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:841px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="HTML/planoEstagio/background1.jpg" width=595 height=841></div>
<div style="position:absolute;left:244.56px;top:88.96px" class="cls_003"><span class="cls_003">MINISTÉRIO DA EDUCAÇÃO</span></div>
<div style="position:absolute;left:181.32px;top:98.08px" class="cls_003"><span class="cls_003">SECRETARIA DE EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</span></div>
<div style="position:absolute;left:70.68px;top:107.32px" class="cls_003"><span class="cls_003">INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SUL DE MINAS GERAIS -  CAMPUS POÇOS DE CALDAS</span></div>
<div style="position:absolute;left:123.96px;top:116.44px" class="cls_004"><span class="cls_004">Avenida Dirce Pereira Rosa, 300 - Jardim Esperança - CEP 37703-100 - Poços de Caldas (MG)</span></div>
<div style="position:absolute;left:178.44px;top:126.76px" class="cls_004"><span class="cls_004">Telefone: (35) 3697-4950 /  </span><A HREF="https://portal.pcs.ifsuldeminas.edu.br/">https://portal.pcs.ifsuldeminas.edu.br/</A> </span></div>
<div style="position:absolute;left:242.88px;top:143.80px" class="cls_006"><span class="cls_006">PLANO DE ESTÁGIO</span></div>
<div style="position:absolute;left:42.48px;top:167.08px" class="cls_004"><span class="cls_004">1. IDENTIFICAÇÃO DO(A) ESTAGIÁRIO(A) E DO PROFESSOR ORIENTADOR</span></div>
<div style="position:absolute;left:51.12px;top:187.48px" class="cls_004"><span class="cls_004">Aluno(a):</span></div>
<div style="position:absolute;left:51.12px;top:218.32px" class="cls_004"><span class="cls_004">Matrícula (R.A):</span></div>
<div style="position:absolute;left:51.12px;top:249.04px" class="cls_004"><span class="cls_004">Curso:</span></div>
<div style="position:absolute;left:277.66px;top:249.04px" class="cls_004"><span class="cls_004">Módulo/Ano:</span></div>
<div style="position:absolute;left:334.68px;top:249.04px" class="cls_004"><span class="cls_004">Modalidade:</span></div>
<div style="position:absolute;left:51.12px;top:279.76px" class="cls_004"><span class="cls_004">Nome completo do(a) professor(a) Orientador(a):</span></div>
<div style="position:absolute;left:51.12px;top:310.48px" class="cls_004"><span class="cls_004">Telefone do orientador:</span></div>
<div style="position:absolute;left:303.15px;top:310.48px" class="cls_004"><span class="cls_004">E-mail do orientador:</span></div>
<div style="position:absolute;left:67.32px;top:350.80px" class="cls_004"><span class="cls_004">2. IDENTIFICAÇÃO DA EMPRESA E DO SUPERVISOR DE ESTÁGIO</span></div>
<div style="position:absolute;left:42.48px;top:377.32px" class="cls_004"><span class="cls_004">Nome da empresa:</span></div>
<div style="position:absolute;left:42.48px;top:408.04px" class="cls_004"><span class="cls_004">E-mail da empresa:</span></div>
<div style="position:absolute;left:359.60px;top:408.04px" class="cls_004"><span class="cls_004">Telefone de contato da empresa:</span></div>
<div style="position:absolute;left:42.48px;top:441.76px" class="cls_004"><span class="cls_004">Supervisor(a) de Estágio:</span></div>
<div style="position:absolute;left:361.93px;top:441.76px" class="cls_004"><span class="cls_004">CPF do(a) supervisor(a):</span></div>
<div style="position:absolute;left:42.48px;top:475.48px" class="cls_004"><span class="cls_004">Curso de formação do(a) supervisor(a) de estágio:</span></div>
<div style="position:absolute;left:359.66px;top:475.48px" class="cls_004"><span class="cls_004">Conselho de Classe Profissional (se houver):</span></div>
<div style="position:absolute;left:42.48px;top:511.24px" class="cls_004"><span class="cls_004">O(A) supervisor(a) de estágio possui experiência profissional na área do estágio:</span></div>
<div style="position:absolute;left:42.48px;top:545.08px" class="cls_004"><span class="cls_004">Telefone do supervisor de estágio:</span></div>
<div style="position:absolute;left:297.58px;top:545.08px" class="cls_004"><span class="cls_004">E-mail do supervisor:</span></div>
<div style="position:absolute;left:42.48px;top:586.60px" class="cls_004"><span class="cls_004">3. IDENTIFICAÇÃO DAS ATIVIDADES DE ESTÁGIO</span></div>
<div style="position:absolute;left:42.48px;top:607.36px" class="cls_004"><span class="cls_004">3.1 Atividades a serem desenvolvidas no estágio:</span></div>
<div style="position:absolute;left:42.48px;top:638.32px" class="cls_004"><span class="cls_004">3.2 Áreas de conhecimento envolvidas no estágio:</span></div>
<div style="position:absolute;left:42.48px;top:669.40px" class="cls_004"><span class="cls_004">3.3 Objetivos a serem alcançados no estágio:</span></div>
<div style="position:absolute;left:42.48px;top:700.48px" class="cls_004"><span class="cls_004">Período do estágio: _____/_____/_________  a _____/_____/_________.</span></div>
<div style="position:absolute;left:42.48px;top:731.56px" class="cls_004"><span class="cls_004">_________________________________________________</span></div>
<div style="position:absolute;left:341.92px;top:731.56px" class="cls_004"><span class="cls_004">______________________________________________</span></div>
<div style="position:absolute;left:67.32px;top:741.88px" class="cls_004"><span class="cls_004">Assinatura do(a) Professor(a) Orientador(a)</span></div>
<div style="position:absolute;left:370.00px;top:741.88px" class="cls_004"><span class="cls_004">Assinatura do(a) Supervisor de Estágio</span></div>
<div style="position:absolute;left:187.32px;top:762.52px" class="cls_004"><span class="cls_004">_________________________________________________</span></div>
<div style="position:absolute;left:240.36px;top:772.96px" class="cls_004"><span class="cls_004">Assinatura do(a) estagiário(a)</span></div>
</div>

</body>
</html>');

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