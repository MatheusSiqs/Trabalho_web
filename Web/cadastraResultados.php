<?php
require_once "../PDO/Banco.php";
$request = json_decode(file_get_contents('php://input'), true);

$hoje = date("Y-m-d H:i:s");

switch($request["tamanho"]){
  case 2:
    $pontuacao = 20-($request['pontuacao'] * 2);
    break;

  case 4:
    $pontuacao = 200-($request['pontuacao'] * 4);
    break;

  case 6:
    $pontuacao = 1000-($request['pontuacao'] * 6);
    break;

  case 8:
    $pontuacao = 3000-($request['pontuacao'] * 8);
    break;
}

if($request["modo"] == "clas"){
  $modo = "C";
}else{
  if($request["modo"] == "temp")
  $modo = "T";
}

$stmt = $cn->prepare("select idJogador from jogador where user = ? limit 1");
$stmt->bindParam(1,$request['idUser']);
$stmt->execute();
$ret = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $ret['idJogador'];

$sql = "INSERT INTO partidas";
$sql .= "(idJogador,Tempo,Pontuacao,Modo,Tamanho,Status,nJogadas,Data)";
$sql .= " VALUE (?,?,?,?,?,?,?,?) ";
$stmt = $cn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $request["tempo"]);
$stmt->bindParam(3, $pontuacao);
$stmt->bindParam(4, $modo);
$stmt->bindParam(5, $request["tamanho"]);
$stmt->bindParam(6, $request["status"]);
$stmt->bindParam(7, $request["pontuacao"]);
$stmt->bindParam(8, $hoje);
if($stmt->execute()){
    $erro = $stmt->errorCode();
    $reponse = "Jogador criado com sucesso!";
    header('HTTP/1.1 201 Created');
    echo $response;
} else {
    $erro = $stmt->errorCode();
    $response= implode(",", $stmt->errorInfo());
    echo $response;
    header('HTTP/1.1 400 Bad Request');
}

?>