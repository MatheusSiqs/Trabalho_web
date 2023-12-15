<?php

require_once "../PDO/Banco.php";

$nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
$dtNasc = isset($_POST['dtnascimento']) ? $_POST['dtnascimento'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$telefone = isset($_POST['tel']) ? $_POST['tel'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$login = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$csenha = isset($_POST['csenha']) ? $_POST['csenha'] : null;

if($senha == $csenha){
  $sql = "INSERT INTO jogador";
  $sql .= "(Nome,dtNasc,CPF,Telefone,email,User,Senha)";
  $sql .= " VALUE (?,?,?,?,?,?,?) ";
  $stmt = $cn->prepare($sql);
  $stmt->bindParam(1, $nome);
  $stmt->bindParam(2, $dtNasc);
  $stmt->bindParam(3, $cpf);
  $stmt->bindParam(4, $telefone);
  $stmt->bindParam(5, $email);
  $stmt->bindParam(6, $login);
  $stmt->bindParam(7, $senha);
  if($stmt->execute()){
      $erro = $stmt->errorCode();
      $mensage[$erro] = "Jogador criado com sucesso!";
      header('location:../login/index.html');
  } else {
      $erro = $stmt->errorCode();
      $mensage[$erro]= implode(",", $stmt->errorInfo());
      header('location:../login/index.html');
  }
}

?>