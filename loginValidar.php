<?php
    session_start();


    $ra = (isset($_POST['ra'])) ? $_POST['ra'] : '';
    $senha = (isset($_POST['password'])) ? $_POST['password'] : '';
    $lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';

    $login = $_POST['ra'];
    $senha = $_POST['password'];
    include_once("conexao.php");
    $query = "SELECT * FROM alunos WHERE ra='$login' AND senha= MD5('$senha')";
    if ($result = $conexao->query($query)) {
        $resultado = $result->fetch_assoc();
        
        if (empty($resultado)) {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
            header("Location: login.php");
        } else {
            $_SESSION['rg'] = $resultado["rg"];
            $_SESSION['cpf'] = $resultado["cpf"];
            $_SESSION['nome'] = $resultado["nome"];
            $_SESSION['cidade'] = $resultado["cidade"];
            $_SESSION['uf'] = $resultado["uf"];
            $_SESSION['cep'] = $resultado["cep"];
            $_SESSION['endereco'] = $resultado["endereco"];
            $_SESSION['bairro'] = $resultado["bairro"];
            $_SESSION['numero'] = $resultado["numero"];
            $_SESSION['curso'] = $resultado["curso"];
            $_SESSION['campus'] = $resultado["campus"];
            $_SESSION['ra'] =  $resultado["ra"];
            $_SESSION['telefoneFixo'] = $resultado["telefoneFixo"];
            $_SESSION['telefoneCelular'] = $resultado["telefoneCelular"];
            $_SESSION['email'] = $resultado["email"];
            $_SESSION['dataNascimento'] = $resultado["dataNascimento"];
            $_SESSION['periodoAno'] = $resultado["periodoAno"];
            $_SESSION['complemento'] = $resultado["complemento"];
            $_SESSION['senha'] = $resultado["senha"];
            $_SESSION['idOrientador'] = $resultado["idOrientador"];
            $_SESSION['idEstagio'] = $resultado["idEstagio"];
            $_SESSION['idSupervisor'] = $resultado["idSupervisor"];
            $_SESSION['idEmpresa'] = $resultado["idEmpresa"];
            if($lembrete == 'remember-me'):
 
                $expira = time() + 60*60*24*30; 
                setCookie('CookieLembrete', base64_encode('remember-me'), $expira);
		        setCookie('CookieRa', base64_encode($ra), $expira);
		        setCookie('CookieSenha', base64_encode($senha), $expira);
      
             else:
      
                setCookie('CookieLembrete');
                setCookie('CookieRa');
                setCookie('CookieSenha');
      
             endif;


            header("Location: home.php");
        }
    }
    /* close connection */
    $conexao->close();
?>