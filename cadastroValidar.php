<?php
   session_start();
   
   include_once("conexao.php");
   $nome = $_POST["nome"];
   $cpf = $_POST["cpf"];
   $rg = $_POST["rg"];
   $telefone = $_POST["telefone"];
   $dataNascimento = $_POST["dataNascimento"];
   $email = $_POST["email"];
   $cep = $_POST["cep"];
   $endereco = $_POST["endereco"];
   $numero = $_POST["numero"];
   $complemento = $_POST["complemento"];
   $bairro = $_POST["bairro"];
   $estado = $_POST["estado"];
   $cidade = $_POST["cidade"];
   $ra = $_POST["ra"];
   $cursoLabel = explode('-', $_POST["curso"]);
   $curso = $cursoLabel[1];
   $modalidade = $cursoLabel[0];
   $periodoAno = $_POST["periodoAno"];
   $senha = $_POST["senha"];
   $campus = $_POST["campus"];

   $query = "INSERT INTO alunos(nome, cpf, rg, telefoneCelular, dataNascimento, email, cep, endereco, numero, complemento, bairro, uf, cidade, ra, curso, modalidade, periodoAno, senha, campus) VALUES ('$nome', '$cpf', '$rg', '$telefone', '$dataNascimento', '$email', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$estado', '$cidade', '$ra', '$curso', '$modalidade', '$periodoAno', MD5('$senha'), '$campus')";

   if ($conexao->query($query) === TRUE) {
      header ("Location: home.php");
   } else {
      echo "Error: " . $query . "<br>" . $conexao->error;
   }
      
?>