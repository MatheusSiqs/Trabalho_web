<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:../login/index.html?erro=login');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title> Jogo da Memoria</title>
<link rel="stylesheet" href="game.css">
</head>

<body>
  <div id="main">
    <div id="infos">
      <div>Numero de jogadas: <div id="pontos">0</div></div>
      <div class="disable">Timer<div id="Timer">0</div></div>
    </div>
    <br>
    <hr>
    <table id="jogo">

    </table>
    <br>  
    <div id="btns">
      <button id="trapaca">Trapaça</button>
      <button id="desistir">Desistir</button>
    </div>
  </div>
  <script src="game.js"></script>
  <p style="display: none;" id="jogador"><?php echo $_SESSION['login'] ?></p>
</body>
</html>