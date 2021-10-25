<?php
include('conexao.php');

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

  if($login == "" || $login == null){

    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastros_usuarios.php';</script>";
    }else{
      if($login_array == $login){
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastros_usuarios.php';</script>";
        die();
      }else{
        $query = "INSERT INTO tb_usuario (nome,login,cpf,cep,rua,numero_rua,telefone,email,senha,id_priv) 
                  VALUES ($nome,$login,$cpf,$cep,$rua,$numero,$telefone,$email,$senha,cast($permissao as integer));";

        $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        if($mysqli){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href=''</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastros_usuarios.php'</script>";
        }
      }
    }
?>