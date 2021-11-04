<?php
    if(isset($_GET['produto'])){ // o botao adicionar foi pressionado? (sim)
            $idProduto = (int) $_GET['adicionar'];
            echo 'ok';
    }
    if(isset($_GET['remover'])){ // o botao remover foi pressionado? (sim)
        $idProduto = (int) $_GET['remover'];
        if(isset($itens[$idProduto])){ //exite um produto no banco de dados com esse id? (sim)
            if(isset($_SESSION['carrinho'][$idProduto])){ //ja existe um produto com esse id no carrinho? (sim)
                if($_SESSION['carrinho'][$idProduto]['quantidade'] > 0){
                    $_SESSION['carrinho'][$idProduto]['quantidade']--;
                    echo 'O item foi removido com sucesso';
                }else{
                    echo'O produto nao está no carrinho.';
                }
            }
        }else{ //exite um produto no banco de dados com esse id? (nao)
            die("voce nao pode remover um item que nao exise");
        }
    }
    if(isset($_GET['limparcarrinho'])){ // o botao remover foi pressionado? (sim)
        $idProduto = (int) $_GET['limparcarrinho'];
        if(isset($itens[$idProduto])){ //exite um produto no banco de dados com esse id? (sim)
            if(isset($_SESSION['carrinho'][$idProduto])){ //ja existe um produto com esse id no carrinho? (sim)
                $_SESSION['carrinho'][$idProduto]['quantidade'] = 0;
            }else{
                echo'O produto nao está no carrinho.';
            }
        }
        else{ //exite um produto no banco de dados com esse id? (nao)
            die("voce nao pode remover um item que nao exise");
        }
    }
?>