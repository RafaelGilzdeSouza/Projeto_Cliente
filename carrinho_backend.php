<?php
include('conexao.php');

//funcoes do home.php
if(isset($_GET['adicionar_produto'])){ // o botao + foi pressionado? (sim)
    $idProduto = (int) $_GET['adicionar_produto'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){ // o produto ja esta no carrinho de compras? (sim)
        if($array_produto['qtd_comprada'] == 10){ // ainda tem estoque? (nao)
            echo 'Produto nao possui estoque.'; // msg de retorno
        }else{ // ainda tem estoque? (sim)
            $qtd_atual = $array_produto['qtd_comprada'] + 1;
            $novo_valor_total = $array_produto['valor_unitario_prod'] * $qtd_atual;
            $query_att = 'update tb_carrinho SET qtd_comprada = '.$qtd_atual.', valor_total = '.$novo_valor_total.' WHERE (id_venda = '.$array_produto['id_venda'].');';
            $resultado = $mysqli->query($query_att) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'Produto '.$array_produto['cod_produto'].' add +1 | qtd_atual: '.$qtd_atual; // msg de retorno
        }
    }else{ // o produto ja esta no carrinho de compras? (nao)
        $query_select = 'select * from tb_produtos where cod_prod = '.$idProduto.';';
        $resultado_select = $mysqli->query($query_select) or die("Falha na execução do código SQL: " . $mysqli->error);
        $array_select_produtos = mysqli_fetch_assoc($resultado_select);
        $query_insert = "insert into tb_carrinho (descricao, qtd_comprada, data_compra, valor_unitario_prod, cod_fornecedor, valor_total, operacao, cod_produto) values (
            '".$array_select_produtos['descricao']."',
            1,
            '04/11/2021',
            ".$array_select_produtos['preco_venda'].",
            1,
            ".$array_select_produtos['preco_venda'].",
            'pendente',
            ".$array_select_produtos['cod_prod'].");";
        $resultado_insert = $mysqli->query($query_insert) or die("Falha na execução do código SQL: " . $mysqli->error);
        $query_select_carrinho = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
        $resultado_select_carrinho = $mysqli->query($query_select_carrinho) or die("Falha na execução do código SQL: " . $mysqli->error);
        $array_select_carrinho = mysqli_fetch_assoc($resultado_select_carrinho);
        echo 'Produto add ao carrinho | qtd_atual: '.$array_select_carrinho['qtd_comprada'].''; // msg de retorno

        
    }
}

if(isset($_GET['diminuir_produto'])){ // o botao - foi pressionado? (sim)
    $idProduto = (int) $_GET['diminuir_produto'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){ // o produto ja esta no carrinho de compras? (sim)
        if($array_produto['qtd_comprada'] >1 ){ // a qtd comprada é maior ou igual a 1 (sim)
            $qtd_atual = $array_produto['qtd_comprada'] - 1;
            $novo_valor_total = $array_produto['valor_unitario_prod'] * $qtd_atual;
            $query_att = 'update tb_carrinho SET qtd_comprada = '.$qtd_atual.', valor_total = '.$novo_valor_total.' WHERE (id_venda = '.$array_produto['id_venda'].');';
            $resultado = $mysqli->query($query_att) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'Produto '.$array_produto['cod_produto'].' sub -1 | qtd_atual: '.$qtd_atual; // msg de retorno
        }elseif($array_produto['qtd_comprada'] <= 1){ // a qtd comprada é menor ou igual a 1 (sim)
            $query_delete = 'delete from tb_carrinho where id_venda ='.$array_produto['id_venda'].';';
            $resultado = $mysqli->query($query_delete) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'deletando produto do carrinho ';
        }
    }
}

//funcoes do carrinho.php
if(isset($_GET['add_qtd_prod'])){ // o botao + foi pressionado? (sim)
    $idProduto = (int) $_GET['add_qtd_prod'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){ // o produto ja esta no carrinho de compras? (sim)
        if($array_produto['qtd_comprada'] == 10){ // ainda tem estoque? (nao)
            echo 'Produto nao possui estoque.'; // msg de retorno
        }else{ // ainda tem estoque? (sim)
            $qtd_atual = $array_produto['qtd_comprada'] + 1;
            $novo_valor_total = $array_produto['valor_unitario_prod'] * $qtd_atual;
            $query_att = 'update tb_carrinho SET qtd_comprada = '.$qtd_atual.', valor_total = '.$novo_valor_total.' WHERE (id_venda = '.$array_produto['id_venda'].');';
            $resultado = $mysqli->query($query_att) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'Produto '.$array_produto['cod_produto'].' add +1 no carrinho final | qtd_atual: '.$qtd_atual; // msg de retorno
        }
    }
}

if(isset($_GET['dim_qtd_prod'])){ // o botao - foi pressionado? (sim)
    $idProduto = (int) $_GET['dim_qtd_prod'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){ // o produto ja esta no carrinho de compras? (sim)
        if($array_produto['qtd_comprada'] >1 ){ // a qtd comprada é maior ou igual a 1 (sim)
            $qtd_atual = $array_produto['qtd_comprada'] - 1;
            $novo_valor_total = $array_produto['valor_unitario_prod'] * $qtd_atual;
            $query_att = 'update tb_carrinho SET qtd_comprada = '.$qtd_atual.', valor_total = '.$novo_valor_total.' WHERE (id_venda = '.$array_produto['id_venda'].');';
            $resultado = $mysqli->query($query_att) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'Produto '.$array_produto['cod_produto'].' sub -1 no carrinho final| qtd_atual: '.$qtd_atual; // msg de retorno
        }elseif($array_produto['qtd_comprada'] <= 1){ // a qtd comprada é menor ou igual a 1 (sim)
            $query_delete = 'delete from tb_carrinho where id_venda ='.$array_produto['id_venda'].';';
            $resultado = $mysqli->query($query_delete) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'deletando produto do carrinho final';
        }
    }
}

if(isset($_GET['excluir_prod_carrinho'])){ // o botao x foi pressionado? (sim)
    $idProduto = (int) $_GET['excluir_prod_carrinho'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){
        $query_delete = 'delete from tb_carrinho where id_venda ='.$array_produto['id_venda'].';';
        $resultado = $mysqli->query($query_delete) or die("Falha na execução do código SQL: " . $mysqli->error);
        echo 'produto excluido do carrinho final';
    }
}

if(isset($_GET['finaliza_compra']) == 1){ // o botao finaliza compra foi pressionado? (sim)
    $query_consulta = "select cod_produto, descricao, valor_unitario_prod, qtd_comprada, valor_total, (SELECT SUM(valor_total) from tb_carrinho) as valor_total_venda from tb_carrinho;";
    $resultado_consulta = $mysqli->query($query_consulta) or die("Falha na execução do código SQL: " . $mysqli->error);
    
    $query_id = "SELECT MAX(id_pedido) as id FROM tb_acompanhamentos;";
    $resultado_id = $mysqli->query($query_id) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_id = mysqli_fetch_assoc($resultado_id);
    $id_carrinho = $array_id['id'];
    $id_carrinho += 1;
    
    if ( ($resultado_consulta) AND ($resultado_consulta->num_rows != 0) ) {
        while($row_produtos = mysqli_fetch_assoc($resultado_consulta)){
            $cod_produto = $row_produtos['cod_produto'];
            $descricao = $row_produtos['descricao'];
            $valor_unitario_prod = $row_produtos['valor_unitario_prod'];
            $qtd_comprada = $row_produtos['qtd_comprada'];
            $valor_total = $row_produtos['valor_total'];
            $status = 'AGUARDANDO ENTREGA';
            $valor_total_venda = $row_produtos['valor_total_venda'];        

            $query_insert = "INSERT INTO tb_acompanhamentos (id_pedido,id_produto,descricao,valor_unitario,qtd_comprada,valor_total_produto,valor_total_venda,status_compra) 
                        VALUES ('$id_carrinho',$cod_produto,'$descricao','$valor_unitario_prod','$qtd_comprada','$valor_total','$valor_total_venda','$status');";
            $resultado_insert = $mysqli->query($query_insert) or die("Falha na execução do código SQL: " . $mysqli->error);
        }
        echo 'CompraFinalizada';
        $query_delete = "DELETE FROM tb_carrinho WHERE id_venda >1;";
        $resultado_delete = $mysqli->query($query_delete) or die("Falha na execução do código SQL: " . $mysqli->error);
    }
    echo 'CompraFinalizada';
}

//funcao compartilhada

if(isset($_GET['atualizaIconeCarrinho'])){ // funcao executada ao pressionar os botoes + ou -
    
    $query = 'select count(*) as qtd from tb_carrinho where qtd_comprada > 0;';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    $qtd = $array_produto['qtd'];
    echo $qtd;
}

    
    ?>