<?php
include('conexao.php');

// o botao btn_cadastrar_fornecedores foi pressionado? (sim)
if(isset($_POST['btn_cadastrar_fornecedores'])){
  // coletando via post as infos da pagina front-end
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

  $query_select = "SELECT cnpj 
                   FROM tb_fornecedor 
                   WHERE cnpj = '$cnpj'";

  $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

  $array = mysqli_fetch_assoc($select);

  $cnpj_array = $array['cnpj'];

  if($cnpj == "" || $cnpj == null){ // o campo cnpj é valido? (nao)
    echo"<script language='javascript' type='text/javascript'>alert('O campo cnpj deve ser preenchido');window.location.href='cadastros_fornecedores.php';</script>";
  }else{// o campo cnpj é valido? (sim)
      if($cnpj_array == $cnpj){ //o fornecedor ja existe no banco? (sim)
        echo"<script language='javascript' type='text/javascript'>alert('Esse cnpj já existe');window.location.href='cadastros_fornecedores.php';</script>";
        die();
      }else{ //o fornecedor ja existe no banco? (nao, entao insere)
        $query = "INSERT INTO tb_fornecedor (razaoSocial,cnpj,cep,rua,numero,bairro,cidade,estado,status,telefone,email) 
                  VALUES ('$razaosocial','$cnpj','$cep_empresa','$rua_empresa','$numero_empresa','$bairro','$cidade','$estado','$status','$telefone','$email');";

        $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        if($mysqli){ //o registro foi inserido? (sim)
          echo"<script language='javascript' type='text/javascript'>alert('Fornecedor cadastrado com sucesso!');window.location.href='cadastros_fornecedores.php'</script>";
        }else{ //o registro foi inserido? (nao)
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse fornecedor');window.location.href='cadastros_fornecedores.php'</script>";
        }
      }
    }
}

// o botao btn_excluir_cadastro_fornecedores foi pressionado? (sim)
if(isset($_POST['btn_excluir_cadastro_fornecedores'])){
  $cnpj = $_POST['cnpj'];
  $query_select = "SELECT cnpj 
                   FROM tb_fornecedor 
                   WHERE cnpj = '$cnpj'";

  $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

  $array = mysqli_fetch_assoc($select);

  $cnpj_array = $array['cnpj'];
  if($cnpj == "" || $cnpj == null){ // o campo cnpj é valido? (nao)
    echo"<script language='javascript' type='text/javascript'>alert('O campo cnpj deve ser preenchido');window.location.href='cadastros_fornecedores.php';</script>";
  }
  else{ // o campo cnpj é valido? (sim)
    if($cnpj_array == $cnpj){ //o registro existe no banco? (sim)
      $query = "DELETE FROM tb_fornecedor 
                WHERE cnpj = '$cnpj';";

      $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
      if($mysqli){ //o registro foi deletado? (sim)
        echo"<script language='javascript' type='text/javascript'>alert('Fornecedor excluido com sucesso!');window.location.href='cadastros_fornecedores.php'</script>";
      }else{ //o registro foi deletado? (nao)
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse fornecedor');window.location.href='cadastros_fornecedores.php'</script>";
      }
    }
    else{ //o registro existe no banco? (nao)
      echo"<script language='javascript' type='text/javascript'>alert('Fornecedor não encontrado para a exclusão!');window.location.href='cadastros_fornecedores.php'</script>";
    }
  }
}
?>