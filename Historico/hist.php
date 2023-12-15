<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:../login/index.html?erro=login');
}

require_once "../PDO/Banco.php";



$stmt = $cn->prepare("select idJogador,nome from jogador where user = ? limit 1");
$stmt->bindParam(1,$_SESSION['login']);
$stmt->execute();
$ret = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $ret['idJogador'];
$nome = $ret['nome'];

$stmt = $cn->prepare("select tempo,pontuacao,modo,tamanho,status,Data from partidas where idJogador = ? order by Data desc");
$stmt->bindParam(1,$id);
$stmt->execute();
$ret = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hist.css">
  <title>Jogo da memoria</title>
</head>
<body>
  <div class="wrap">
    <div class="modal">
      <div class="content">
        <div>
          <h1>Histórico da partida</h1>
          <p>O seu histórico de partidas:</p>
        </div>
        <div>
          Nome: <?php echo $nome?>
        </div>
        <div>
          <table>
            <thead>
              <tr>
                <td>Dimensão</td>
                <td>Tipo</td>
                <td>Tempo</td>
                <td>Status</td> 
                <td>Pontuação</td> 
                <td>Data</td> 
              </tr>             
            </thead>
            <tbody>
              <?php
                if($ret){
                  foreach ($ret as $row){
                    ?>
                    <tr style="<?php
                      if($row->status == 'V'){
                        echo "background-color:green;";
                      }else{
                        if($row->status == "D"){
                          echo "background-color:red;";
                        }
                      }
                    ?>">
                    <td><?php echo $row->tamanho,"X",$row->tamanho ?></td>
                    <td><?php 
                      if($row->modo == "T"){
                        echo "Contra o Tempo";
                      }else{
                        if($row->modo == "C"){
                          echo "Classico";
                        }
                      }
                    ?></td>
                    <td><?php
                      echo $row->tempo;
                    ?></td>
                    <td>
                    <?php
                      if($row->status == 'V'){
                        echo "Vitoria";
                      }else{
                        if($row->status == "D"){
                          echo "Derrota";
                        }
                      }
                    ?></td>

                    <td><?php
                      echo $row->pontuacao;
                    ?></td>

                    <td><?php
                      echo $row->Data;
                    ?></td>
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
          <a href="../Menu/menu.php" style="text-decoration: none;">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>