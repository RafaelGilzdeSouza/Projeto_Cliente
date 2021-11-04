<?php
include('conexao.php');

if(isset($_GET['add_produto'])){ // o botao + foi pressionado? (sim)
    $idProduto = (int) $_GET['add_produto'];
    $query = 'select * from tb_carrinho where cod_produto = '.$idProduto.';';
    $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
    $array_produto = mysqli_fetch_assoc($resultado);
    if ($array_produto['cod_produto'] == $idProduto){ // o produto ja esta no carrinho de compras? (sim)
        if($array_produto['qtd_comprada'] == 10){ // ainda tem estoque? (nao)
            echo 'Produto '.$array_produto['cod_produto'].' nao possui estoque.'; // msg de retorno
        }else{ // ainda tem estoque? (sim)
            $qtd_atual = $array_produto['qtd_comprada'] + 1;
            
            $query_att = 'update tb_carrinho SET qtd_comprada = '.$qtd_atual.' WHERE (id_venda = '.$array_produto['id_venda'].');';
            $resultado = $mysqli->query($query_att) or die("Falha na execução do código SQL: " . $mysqli->error);
            echo 'Produto '.$array_produto['cod_produto'].' add +1 | qtd_atual: '.$array_produto['qtd_comprada']; // msg de retorno
        }
    }else{ // o produto ja esta no carrinho de compras? (nao)
        $query = 'select * from tb_produtos where cod_prod = '.$idProduto.';';
        $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        $array_produto = mysqli_fetch_assoc($resultado);
        $query = "insert into tb_carrinho (descricao, qtd_comprada, data_compra, valor_unitario_prod, cod_fornecedor, valor_total, operacao, cod_produto) values (
            '".$array_produto['descricao']."',
            1,
            '04/11/2021',
            ".$array_produto['preco_venda'].",
            1,
            ".$array_produto['preco_venda'].",
            'pendente',
            ".$array_produto['cod_prod'].");";
        $resultado = $mysqli->query($query) or die("Falha na execução do código SQL: " . $mysqli->error);
        
        echo 'Produto add ao carrinho | qtd_atual: '.$array_produto['qtd_comprada']; // msg de retorno

        
    }
}

if(isset($_GET['diminuir_produto'])){ // o botao - foi pressionado? (sim)
$idProduto = (int) $_GET['diminuir_produto'];
echo $_GET['diminuir_produto'];
}

if(isset($_GET['atualizaCarrinho'])){ // funcao executada ao pressionar os botoes + ou -
    
    echo 1;    
}


    
?>