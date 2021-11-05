<?php
include('conexao.php');

if(isset($_GET['add_produto'])){ // o botao + foi pressionado? (sim)
    $idProduto = (int) $_GET['add_produto'];
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
            echo 'deletando produto do carrinho';
        }
    }
}

if(isset($_GET['atualizaCarrinho'])){ // funcao executada ao pressionar os botoes + ou -
    
    $query = 'select count(*) as qtd from tb_carrinho where qtd_comprada > 0;';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    $qtd = $array_produto['qtd'];
    echo $qtd;
}





    
?>