<?php
include('conexao.php');

// coletando as variaveis que vieram do input da pagina cadastros_usuarios.php
// o botao btn_cadastrar_usuario foi pressionado (sim)
if(isset($_POST['btn_cadastrar_usuario'])){ 
  $nome = $_POST['nome'];
  $login = $_POST['login'];
  $cpf = $_POST['cpf'];
  $cep = $_POST['cep'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $senha = MD5($_POST['senha']);
  $permissao = $_POST['permissao'];

  $query_select = "SELECT login FROM tb_usuario WHERE login = '$login'";

  $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

  $array = mysqli_fetch_assoc($select);

  $login_array = $array['login'];

  // o campo login é valido? (nao)
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastros_usuarios.php';</script>";
  }else{ // o campo login é valido? (sim)
      if($login_array == $login){ // o login ja tem cadastro? (sim)
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastros_usuarios.php';</script>";
        die();
      }else{ // o login ja tem cadastro? (nao, entao insere as infos no banco)
        $query = "INSERT INTO tb_usuario (nome,login,cpf,cep,rua,numero_rua,telefone,email,senha,id_priv) 
                  VALUES ('$nome','$login','$cpf','$cep','$rua','$numero','$telefone','$email','$senha','$permissao');";

        $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        if($mysqli){ // o cadastro foi realizado? (sim)
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastros_usuarios.php'</script>";
        }else{ // o cadastro foi realizado? (nao)
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastros_usuarios.php'</script>";
        }
      }
    }
}

// o botao btn_excluir_cadastro_usuario foi pressionado (sim)
if(isset($_POST['btn_excluir_cadastro_usuario'])){
  $login = $_POST['login']; // coletando o login para excluir
  $query_select = "SELECT login FROM tb_usuario WHERE login = '$login'";

  $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

  $array = mysqli_fetch_assoc($select);

  $login_array = $array['login'];
  if($login == "" || $login == null){ // o login foi preenchido?(nao)
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastros_usuarios.php';</script>";
  }
  else{// o login foi preenchido?(sim)
    if($login_array == $login){ //existe este usuario no banco? (sim)
      $query = "DELETE FROM tb_usuario WHERE login = '$login';";

      $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
      if($mysqli){ //o registro foi excluido? (sim)
        echo"<script language='javascript' type='text/javascript'>alert('Usuário excluido com sucesso!');window.location.href='cadastros_usuarios.php'</script>";
      }else{ //o registro foi excluido? (nao)
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível exluir esse usuário');window.location.href='cadastros_usuarios.php'</script>";
      }
    }
    else{ //existe este usuario no banco? (nao)
      echo"<script language='javascript' type='text/javascript'>alert('Usuário não encontrado para a exclusão!');window.location.href='cadastros_usuarios.php'</script>";
    }
  }
}
?>