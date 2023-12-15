<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:../login/index.html?erro=login');
}

require_once "../PDO/Banco.php";

$stmt = $cn->prepare("select * from jogador where user = ? limit 1");
$stmt->bindParam(1,$_SESSION['login']);
$stmt->execute();
$ret = $stmt->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Einfos.css">
    <title>Jogo da Memoria</title>
  </head>
  <body>
    <div class="wrap">
      <div class="modal">
        <div class="content">
          <div>
            <h1>Edite seus dados</h1>
            <p>Confirme e altere os seus dados:</p>
          </div><br>
          <div>
            <form action="atualizaCadastro.php" class="formulario" method="POST">
              <label for="Nome">Nome Completo</label>
              <input type="text" name="Nome" id="Nome" placeholder="Nome Completo" value="<?php echo $ret->Nome;?>"><br>

              <label for="dtnascimento">Data de nascimento</label>
              <input type="date" name="dtnascimento" id="dtnascimento" readonly value="<?php echo $ret->DtNasc;?>"><br>

              <label for="cpf">CPF</label>
              <input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $ret->CPF;?>" readonly><br>

              <label for="tel">Telefone</label>
              <input type="tel" name="tel" id="tel" placeholder="Telefone" value="<?php echo $ret->Telefone;?>"><br>
              
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $ret->email;?>"><br>

              <label for="usuario">Usuário</label>
              <input type="text" name="usuario" id="usuario" placeholder="Usuário" value="<?php echo $ret->User;?>"readonly><br>

              <label for="senha">Senha</label>
              <input type="password" name="senha" id="senha" placeholder="Senha"><br>

              <label for="csenha">Confirmar Senha</label>
              <input type="password" name="csenha" id="csenha" placeholder="Confirmar Senha"><br>

              <input type="submit" name="submit" id="submit" value="Atualizar"><br>
              <button formaction="../Menu/menu.php">Cancelar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>


</html>