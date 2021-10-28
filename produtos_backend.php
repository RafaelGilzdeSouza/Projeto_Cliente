<?php
include('conexao.php');

if(isset($_POST['btn_cadastrar_produtos'])){
    
  $descricao_produto = $_POST['descricao_produto'];
  $fabricante = $_POST['fabricante'];
  $cod_barras = $_POST['cod_barras'];
  $preco_custo = $_POST['preco_custo'];
  $margem_lucro = $_POST['margem_lucro'];
  $preco_venda = $_POST['preco_venda'];
  $estoque = $_POST['estoque'];
  $grupo = $_POST['grupo'];
  $foto = $_POST['foto'];
  $data_ult_entrega = $_POST['data_ult_entrega'];
  $forn_ult_entrega = $_POST['forn_ult_entrega'];
  $promocao = $_POST['promocao'];
  $curvaABC = $_POST['curvaABC'];
  
  $query_select = "SELECT codigo_barras FROM tb_produtos WHERE codigo_barras = '$cod_barras'";

  $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

  $array = mysqli_fetch_assoc($select);

  $cod_array = $array['codigo_barras'];

  if($cod_barras == "" || $cod_barras == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo Código de Barras deve ser preenchido');window.location.href='cadastros_produtos.php';</script>";
  }else{
      if($cod_array == $cod_barras){
        echo"<script language='javascript' type='text/javascript'>alert('Esse produto já existe');window.location.href='cadastros_produtos.php';</script>";
        die();
      }else{
        $query = "INSERT INTO tb_produtos (descricao,fabricante,codigo_barras,preco_custo,margem_lucro,preco_venda,estoque,grupo,foto,data_chegou,fornecedor,promocao,curvaABC) 
                  VALUES ('$descricao_produto','$fabricante','$cod_barras','$preco_custo','$margem_lucro','$preco_venda','$estoque','$grupo','$foto','$data_ult_entrega','$forn_ult_entrega','$promocao','$curvaABC');";

        $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        if($mysqli){
          echo"<script language='javascript' type='text/javascript'>alert('Produto cadastrado com sucesso!');window.location.href='cadastros_produtos.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse produto');window.location.href='cadastros_produtos.php'</script>";
        }
      }
    }
}

if(isset($_POST['btn_excluir_cadastro_produtos'])){
    $cod_barras = $_POST['cod_barras'];
    $query_select = "SELECT codigo_barras FROM tb_produtos WHERE codigo_barras = '$cod_barras'";

    $select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);

    $array = mysqli_fetch_assoc($select);

    $cod_array = $array['codigo_barras'];
    if($cod_barras == "" || $cod_barras == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo Código de Barras deve ser preenchido');window.location.href='cadastros_produtos.php';</script>";
    }
    else{
        if($cod_array == $cod_barras){
            $query = "DELETE FROM tb_produtos WHERE codigo_barras = '$cod_barras';";

            $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
            if($mysqli){
                echo"<script language='javascript' type='text/javascript'>alert('Produto excluido com sucesso!');window.location.href='cadastros_produtos.php'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível exluir esse produto');window.location.href='cadastros_produtos.php'</script>";
            }
        }
        else{
        echo"<script language='javascript' type='text/javascript'>alert('Produto não encontrado para a exclusão!');window.location.href='cadastros_produtos.php'</script>";
        }
    }
}
?>