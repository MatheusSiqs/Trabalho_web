<?php

require_once "../PDO/Banco.php";

$nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
$telefone = isset($_POST['tel']) ? $_POST['tel'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$csenha = isset($_POST['csenha']) ? $_POST['csenha'] : null;
$login = isset($_POST['usuario']) ? $_POST['usuario'] : null;

if($senha == $csenha and $senha !=NULL and $csenha !=NULL){
  $sql = "update jogador ";
    $sql .= "set nome= ? , Telefone = ? , email = ? , Senha = ?";
    $sql .= " where User = ?";
    $stmt = $cn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $telefone);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $senha);
    $stmt->bindParam(5, $login);
    if($stmt->execute()){
        $erro = $stmt->errorCode();
        $mensage[$erro] = "Jogador atualizado com sucesso!";
        header('location:../menu/menu.php');
    } else {
        $erro = $stmt->errorCode();
        $mensage[$erro]= implode(",", $stmt->errorInfo());
        header('location:Einfos.php');
    }
}else{
  $sql = "update jogador ";
  $sql .= "set Nome = :nome, Telefone = :tel, email = :email";
  $sql .= " where User = :login";
  $stmt = $cn->prepare($sql);
  $stmt->bindParam('nome', $nome);
  $stmt->bindParam('tel', $telefone);
  $stmt->bindParam('email', $email);
  $stmt->bindParam('login', $login);
  if($stmt->execute()){
      $erro = $stmt->errorCode();
      $mensage[$erro] = "Jogador atualizado com sucesso!";
      header('location:../menu/menu.php');
  } else {
      $erro = $stmt->errorCode();
      $mensage[$erro]= implode(",", $stmt->errorInfo());
      header('location:Einfos.php');
  }
}

?>