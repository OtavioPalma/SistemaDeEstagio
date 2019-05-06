<?php
    session_start();
    
    /*function tirarAcentos($string) {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"), $string);
    }*/

    require_once('conexao.php');

    // Dados do aluno
    $raAluno = $_SESSION['ra'];
    $nomeAluno = $_POST['inputNome'];
    $cpfAluno = $_POST['inputCpf'];
    $rgAluno = $_POST['inputRg'];
    $telefoneAluno = $_POST['inputTelefone'];
    $dataNascimentoAluno = $_POST['inputDataNascimento'];
    $emailAluno = $_POST['inputEmail'];
    $cursoAluno = $_POST['selectCurso'];
    $moduloAluno = $_POST['inputAno'];
    $cepAluno = $_POST['inputCep'];
    $enderecoAluno = $_POST['inputEndereco'];
    $numeroAluno = $_POST['inputNumero'];
    $complementoAluno = $_POST['inputComplemento'];
    $bairroAluno = $_POST['inputBairro'];
    $cidadeAluno = $_POST['inputCidade'];
    $estadoAluno = $_POST['selectEstado'];

    $queryPt1 = 'UPDATE alunos SET ' .
        'nome="' . $nomeAluno . '", ' .
        'cpf="' . $cpfAluno . '", ' .
        'rg="' . $rgAluno . '", ' .
        'telefoneCelular="' . $telefoneAluno . '", ' .
        'dataNascimento="' . $dataNascimentoAluno . '", ' .
        'email="' . $emailAluno . '", ' .
        'curso="' . $cursoAluno . '", ' .
        'periodoAno="' . $moduloAluno . '", ' .
        'cep="' . $cepAluno . '", ' .
        'endereco="' . $enderecoAluno . '", ' .
        'numero="' . $numeroAluno . '", ' .
        'bairro="' . $bairroAluno . '", ' .
        'cidade="' . $cidadeAluno . '", ' .
        'uf="' . $estadoAluno . '"';

    if($complementoAluno != '') {
        $queryPt1 = $queryPt1 . ', complemento="' . $complementoAluno . '"';
    }

    $queryPt2 = ' WHERE ra="' . $raAluno . '"';

    $query = $queryPt1 . $queryPt2;

    if (!$conexao->query($query) === TRUE) {
        echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
        echo "Error updating record: " . $conexao->error;
        exit;
    }

    // Dados do orientador
    $nomeOrientador = $_POST['inputNomeOrientador'];
    $telefoneOrientador = $_POST['inputTelefoneOrientador'];
    $emailOrientador = $_POST['inputEmailOrientador'];

    $query = 'SELECT idOrientador FROM orientador';
    if ($resultado = $conexao->query($query)) {
        while($linha = $resultado->fetch_assoc()) {
            if($_SESSION['idOrientador'] != '') {
                if($_SESSION['idOrientador'] == $linha['idOrientador']) {
                    $queryPt1 = 'UPDATE orientador SET ' .
                    'nome="' . $nomeOrientador . '", ' .
                    'email="' . $emailOrientador . '", ' .
                    'telefone="' . $telefoneOrientador . '"';
                    $queryPt2 = ' WHERE idOrientador="' . $_SESSION['idOrientador'] . '"';

                    $query = $queryPt1 . $queryPt2;

                    if (!$conexao->query($query) === TRUE) {
                        echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                        echo "Error updating record: " . $conexao->error;
                        exit;
                    }
                }
            } else {
                $query1 = "INSERT INTO orientador (nome, email, telefone) VALUES ('$nomeOrientador', '$emailOrientador', '$telefoneOrientador')";
                if (!$conexao->query($query1) === TRUE) {
                    echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                    echo "Error updating record: " . $conexao->error;
                    exit;
                }
                $_SESSION['idOrientador'] = $conexao->insert_id;
                $query1 = "UPDATE alunos SET idOrientador = ".$_SESSION['idOrientador']." WHERE ra = ".$_SESSION['ra'].""; 
                if (!$conexao->query($query1) === TRUE) {
                    echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                    echo "Error updating record: " . $conexao->error;
                    exit;
                }
            }
        }
    } if (!$conexao->query($query) === TRUE) {
        echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
        echo "Error updating record: " . $conexao->error;
        exit;
    }

    // Dados da Empresa
    $nomeEmpresa = $_POST['inputNomeEmpresa'];
    $cnpjEmpresa = $_POST['inputCnpj'];
    $emailEmpresa = $_POST['inputEmailEmpresa'];
    $telefoneEmpresa = $_POST['inputTelefoneEmpresa'];
    $cepEmpresa = $_POST['inputCepEmpresa'];
    $enderecoEmpresa = $_POST['inputEnderecoEmpresa'];
    $numeroEmpresa = $_POST['inputNumeroEmpresa'];
    $complementoEmpresa = $_POST['inputComplementoEmpresa'];
    $bairroEmpresa = $_POST['inputBairroEmpresa'];
    $cidadeEmpresa = $_POST['inputCidadeEmpresa'];
    $estadoEmpresa = $_POST['selectEstadoEmpresa'];
    $representanteEmpresa = $_POST['inputNomeRepresentante'];
    $representanteEmpresaCargo = $_POST['inputCargoRepresentante'];
    $responsavelEmpresa = $_POST['inputResponsavelAssTCE'];
    $responsavelEmpresaCargo = $_POST['inputCargoResponsavelAssTCE'];

    $query = 'SELECT idEmpresa FROM concedentes';
    if ($resultado = $conexao->query($query)) {
        while($linha = $resultado->fetch_assoc()) {
            if($_SESSION['idEmpresa'] != '') {
                if($_SESSION['idEmpresa'] == $linha['idEmpresa']) {
                    $queryPt1 = 'UPDATE concedentes SET ' .
                    'nome="' . $nomeEmpresa . '", ' .
                    'cnpjCpf="' . $cnpjEmpresa . '", ' .
                    'endereco="' . $enderecoEmpresa . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '", ' .
                    '="' . $ . '"';
                    $queryPt2 = ' WHERE idEmpresa="' . $_SESSION['idEmpresa'] . '"';

                    $query = $queryPt1 . $queryPt2;

                    if (!$conexao->query($query) === TRUE) {
                        echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                        echo "Error updating record: " . $conexao->error;
                        exit;
                    }
                }
            } else {
                $query1 = "INSERT INTO orientador (nome, email, telefone) VALUES ('$nomeOrientador', '$emailOrientador', '$telefoneOrientador')";
                if (!$conexao->query($query1) === TRUE) {
                    echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                    echo "Error updating record: " . $conexao->error;
                    exit;
                }
                $_SESSION['idOrientador'] = $conexao->insert_id;
                $query1 = "UPDATE alunos SET idOrientador = ".$_SESSION['idOrientador']." WHERE ra = ".$_SESSION['ra'].""; 
                if (!$conexao->query($query1) === TRUE) {
                    echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
                    echo "Error updating record: " . $conexao->error;
                    exit;
                }
            }
        }
    } if (!$conexao->query($query) === TRUE) {
        echo "Ops, parece que ocorreu um erro! Por favor, contate o administrador.<br />";
        echo "Error updating record: " . $conexao->error;
        exit;
    }

    $conexao->close();
?>
