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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rank.css">
    <title>Jogo da Memoria</title>
  </head>
  <body>
    <div class="wrap">
      <div class="modal">
        <div class="content">
          <div>
            <h1>Ranking</h1>
            <p>Consulte o Rank dos melhores jogadores:</p>
          </div>
          
          <div>
            <p>Escolha o modo desejado:</p>
            <a href="Rclassico.php" class="modo">Classico</a>
            <a href="RCtempo.php" class="modo">Contra o tempo</a>
            <a href="../Menu/menu.php" class="modo">Voltar</a>
          </div>
        </div>
      </div>
    </div>

  </body>


</html>