<?php
require_once '../PDO/Banco.php';
session_start();
$login = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

$stmt = $cn->prepare("select User,Senha from jogador where User = ? and Senha = ?");
$stmt->bindParam(1,$login);
$stmt->bindParam(2,$senha);
$stmt->execute();
$consu = $stmt;

if($consu->rowCount()>0){
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  header('location:../menu/menu.php');
}else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:../login/index.html?erro=login');
}

?>