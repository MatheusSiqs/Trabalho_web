<?php
$host = "localhost";
$dbname = "jogo_memoria";
$usuario = "root";
$senha = "";
try{
    $cn = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$senha);
    $cn->exec("set names utf8");
} catch (PDOException $e) {
    echo "Falha: " . $e->getMessage();
    exit();
}

?>