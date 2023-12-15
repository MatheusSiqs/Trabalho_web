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
    <link rel="stylesheet" href="Ejogo.css">
    <title>Jogo da Memoria</title>
  </head>
  <body>
    <div class="wrap">
      <div class="modal">
        <div class="content">
          <div>
            <h1>Escolha o modo de jogo</h1>
          </div>
          <div>
            <form action="../web/game.php" target="_self" method="get" id="menu">
              <div class="opp">
                <select name="modo">
                  <option value="clas">Classico</option>
                  <option value="temp">Contra o tempo</option>
                </select>

                <select name="tamanho">
                  <option value="2">2x2</option>
                  <option value="4">4x4</option>
                  <option value="6">6x6</option>
                  <option value="8">8x8</option>
                </select>
              </div>
              <br><br>

              <div class="btns">
                <input type="submit" name="submit" value="Jogar">
                <a href="../Menu/menu.php" style="text-decoration: none;">Voltar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>