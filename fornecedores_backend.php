<?php
include('conexao.php');

$razaosocial = $_POST['razaosocial'];
$cnpj = $_POST['cnpj'];
$cep_empresa = $_POST['cep_empresa'];
$rua_empresa = $_POST['rua_empresa'];
$numero_empresa = $_POST['numero_empresa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$status = $_POST['status'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$query_select = "SELECT cnpj FROM tb_fornecedor WHERE cnpj = '$cnpj'";

$select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

$array = mysqli_fetch_assoc($select);

$cnpj_array = $array['cnpj'];

  if($cnpj == "" || $cnpj == null){

    echo"<script language='javascript' type='text/javascript'>alert('O campo cnpj deve ser preenchido');window.location.href='cadastros_fornecedores.php';</script>";
    }else{
      if($cnpj_array == $cnpj){
        echo"<script language='javascript' type='text/javascript'>alert('Esse cnpj já existe');window.location.href='cadastros_fornecedores.php';</script>";
        die();
      }else{
        $query = "INSERT INTO tb_fornecedor (razaoSocial,cnpj,cep,rua,numero,bairro,cidade,estado,status,telefone,email) 
                  VALUES ('$razaosocial','$cnpj','$cep_empresa','$rua_empresa','$numero_empresa','$bairro','$cidade','$estado','$status','$telefone','$email');";

        $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        if($mysqli){
          echo"<script language='javascript' type='text/javascript'>alert('Fornecedor cadastrado com sucesso!');window.location.href='cadastros_fornecedores.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse fornecedor');window.location.href='cadastros_fornecedores.php'</script>";
        }
      }
    }
?>