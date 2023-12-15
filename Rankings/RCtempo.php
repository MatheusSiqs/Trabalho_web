<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:../login/index.html?erro=login');
}

require_once "../PDO/Banco.php";

$stmt = $cn->prepare("select pontuacao,tamanho,n.user,tempo from partidas p 
inner join jogador n on p.idJogador = n.idJogador where modo = 'T' order by tamanho desc,tempo desc,pontuacao desc");
$stmt->execute();
$ret = $stmt->fetchAll(PDO::FETCH_OBJ);

$rank = 1;


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
            <h1>Ranking Contra o tempo</h1>
            <p>Rank dos melhores jogadores no modo contra o tempo:</p>
          </div>
          
          <div>
            <table>
              <thead>
                <tr>
                  <td>Rank</td>
                  <td>Username</td>
                  <td>Pontuação</td> 
                  <td>Dimensão</td>
                  <td>Tempo</td>
                </tr>               
              </thead>
              <tbody>
              <?php
                    if($ret){
                      foreach($ret as $row){?>
                        <tr>
                          <td><?php echo $rank; $rank+=1; ?></td>
                          <td><?php echo $row->user;?></td>
                          <td><?php echo $row->pontuacao;?></td>
                          <td><?php echo $row->tamanho,"X",$row->tamanho;?></td>
                          <td><?php echo $row->tempo;?></td>
                        </tr>
                  <?php
                      }
                    }
                  ?>
              </tbody>
            </table>
          </div>
          <br>
          <div>
            <a href="rank.php" class="modo">Voltar</a>
          </div>
        </div>
      </div>
    </div>

  </body>


</html>