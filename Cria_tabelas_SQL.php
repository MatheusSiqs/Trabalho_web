<?php
$host = "localhost";
$dbname = "jogo_memoria";
$usuario = "root";
$senha = "";
try{
    $cn = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$senha);
    $cn->exec("set names utf8");
    //Cria a tabela de jogador
    $sql = "CREATE TABLE jogador (idJogador SMALLINT NOT NULL AUTO_INCREMENT, Nome VARCHAR(30) NOT NULL, DtNasc DATE NOT NULL, CPF TEXT NOT NULL, Telefone TEXT NOT NULL, email VARCHAR(30) NOT NULL, User VARCHAR(20) NOT NULL, Senha VARCHAR(20) NOT NULL, PRIMARY KEY (idJogador), UNIQUE CPF (CPF));";
    $stmt = $cn->prepare($sql);
    $stmt->execute();
    //Cria a tabela de partidas
    $sql = "CREATE TABLE partidas (idPartida SMALLINT NOT NULL AUTO_INCREMENT, idJogador SMALLINT NOT NULL, Tempo TIME NULL, Pontuacao INT NOT NULL, Modo CHAR(1) NOT NULL, Tamanho INT NOT NULL, Status CHAR(1) NOT NULL, nJogadas INT NOT NULL, Data DATETIME NOT NULL, PRIMARY KEY (idPartida))";
    $stmt = $cn->prepare($sql);
    $stmt->execute();
    //adiciona foreing key
    $sql = "ALTER TABLE partidas add constraint `fk_jogador` FOREIGN KEY(idJogador) REFERENCES jogador(idJogador)";
    $stmt = $cn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha: " . $e->getMessage();
    exit();
}
?>