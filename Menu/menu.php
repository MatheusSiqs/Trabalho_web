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
    <link rel="stylesheet" href="menu.css">
    <title>Jogo da Memoria</title>
  </head>
  <body>
    <div class="wrap">
      <div class="modal">
        <div class="content">
          <div>
            <h1>Menu</h1>
            <p>Escolha uma opção:</p>
          </div><br>
          <div class="menu">
            <a href="../Ejogo/Ejogo.php">Jogar</a>
            <a href="../Historico/hist.php">Historico</a>
            <a href="../Rankings/rank.php">Ranking</a>
            <a href="../Einfos/Einfos.php">Alteração de dados</a>
            <a href="../Login/index.html">Sair</a>
          </div>
        </div>
      </div>
    </div>

  </body>


</html>