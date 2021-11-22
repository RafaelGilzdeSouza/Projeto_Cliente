<?php
include('conexao.php');

if(isset($_POST['btn_entrar'])){ // botao entrar foi clicado? (sim)
  if(isset($_POST['login']) || isset($_POST['senha'])) {
    if($_POST['login'] === '' || $_POST['senha'] === '') { // os campos estao todos preenchidos? (nao)
      echo '
      <div style=" margin-top:10px;margin-left: 10;margin-bottom: 5%; position:absolute ;top: 5px;">
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="15" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>Todos os campos precisam estar preenchidos</div>
        </div>
      </div>';
    }
    else{ // os campos estao todos preenchidos? (sim)
      $login = $mysqli->real_escape_string($_POST['login']);
      $senha = $mysqli->real_escape_string(MD5($_POST['senha'])); //aplica a funcao de criptografia na senha digitada para comparacao no banco

      $sql_code = "SELECT *
                    FROM tb_usuario
                    WHERE login = '$login' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

      if($sql_query->num_rows == 1) { // existe algum registro com essas infos no banco? (sim)
          $usuario = $sql_query->fetch_assoc();

          if(!isset($_SESSION)) { //a sessao ja foi iniciada? (nao)
              session_start();
          }
          $_SESSION['cod_interno'] = $usuario['cod_interno'];
          $_SESSION['nome'] = $usuario['nome'];
          $_SESSION['login'] = $usuario['login'];
          $_SESSION['id_priv'] = $usuario['id_priv'];
          header("Location: home.php");
      }
      else { // existe algum registro com essas infos no banco? (nao)
          echo '
          <div style=" margin-top:10px;margin-left: 10;margin-bottom: 5%; position:absolute ;top: 5px;">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="15" height="10" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <div>Login ou Senha incorretos!</div>
            </div>
          </div>';
      }
    }
  }
}?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cadastros de Usuários</title>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    
    <!-- Adicionando a biblioteca jQuery Mask ao projeto -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    <!-- Adicionando o Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <div class=telaLogin>
      <div class="container py-5 h-20">
        <div class="row d-flex justify-content-center align-items-center h-20">
          <div class="col-xl-9"> 
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6"> <!--Coluna da esquerda com largura 6-->
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                        <img src="img/logo.png" style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Electronics Store </h4>
                    </div>
                    <form name='formulario' action="" method="POST"> <!--Criando o form para envio das infos para o php-->
                        <p>Faça login para entrar</p>
                        <div class="form-outline mb-4"> 
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login" />
                        </div>
                        <div class="form-outline mb-4">
                            <input name="senha" type="password" id="senha" class="form-control" placeholder="Senha" />
                        </div>
                        <div class="text-center pt-1 mb-5 pb-1">
                            <button name='btn_entrar' id='btn_entrar' class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Entrar</button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2"> <!--Coluna da direita com largura 6-->
                  <div class="text-white text-center px-3 py-4 p-md-5 mx-md-4">
                    <img src="img/logousuario.png" style="width: 355px;" alt="logo">
                    <h4 class="mb-4">Bem vindo!</h4>
                    <p3 class="medium mb-0">Acesse nosso site para comprar ;)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>