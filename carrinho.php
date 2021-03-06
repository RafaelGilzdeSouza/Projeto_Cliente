<?php
include('conexao.php');
//selecionando os produtos da tabela carrinho
$resultado_prod = "SELECT cod_produto, descricao, valor_unitario_prod, qtd_comprada, valor_total 
                   FROM tb_carrinho;";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);

//selecionando o valor total de do carrinho onde o fornecedor é 1
$query_total_geral = 'SELECT SUM(valor_total) AS total_geral,
                     (SELECT razaoSocial FROM tb_fornecedor WHERE cod_forn = 1) AS dist
                      FROM tb_carrinho;';
$resultado_total_geral = $mysqli->query($query_total_geral) or die("Falha na execução do código SQL: " . $mysqli->error);
$array_total = mysqli_fetch_assoc($resultado_total_geral);

session_start();
$GLOBALS['ID'] = $_SESSION['id_priv'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrinho de Compras</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include ('header.php');?>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container px-4 px-lg-5 mt-5">  <!--Div dos produtos-->
                <form method="POST" action="">
                    <div class="col-md-12"> <!--Div dos produtos-->
                        <table class="table">
                            <thead>
                                <tr><!--Linha do cabecalho da tabela-->
                                    <th class="text-center">Cod. Prod.</th>
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Valor Unitário</th>
                                    <th class="text-center">Qtd</th>
                                    <th class="text-center">Valor Total</th>
                                    <th class="text-center">Alterar Quantidade</tr>
                            </thead>
                            <tbody><!--Estrutura das linhas da tabela-->
                                <?php
                                    if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) { // o resultado é valido? (sim)
                                        while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                                            echo utf8_encode('
                                            <tr class="table-active "> 
                                                <td name="cod_prod" class="text-center">'.$row_produtos['cod_produto'].'</td>
                                                <!--"substr" controla a quantidade de caracteres apresentados-->
                                                <td name="descricao" class="text-center">'.substr( utf8_decode($row_produtos['descricao']),0,50).'</td>
                                                <td name="valor_unitario_prod" class="text-center">R$ '.$row_produtos['valor_unitario_prod'].'</td>
                                                <td name="qtd_comprada" class="text-center">'.$row_produtos['qtd_comprada'].'</td>
                                                <td name="valor_total" class="text-center">R$ '.$row_produtos['valor_total'].'</td>
                                                <td>
                                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center" style="padding-bottom: 12px;width: 208px;height: 44px;">
                                                        <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_produto'].'"><i class="bi bi-bag-plus"></i></button>
                                                        <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_produto'].'"><i class="bi bi-bag-dash"></i></button>
                                                        <button name="btn_excluir" class="btn btn-outline-dark mt-auto" onclick="excluir(this.value)" value="'.$row_produtos['cod_produto'].'"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>'
                                            );
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <!--Estrutura da linha de resumo do total geral-->
                                <tr><!--Cabecalho da linha de resumo do total geral-->
                                    <th class="text-center">Itens dist.</th>
                                    <th class="text-center">Fornecedor</th>
                                    <th class="text-center">Total Bruto</th>
                                    <th class="text-center">Total Desconto</th>
                                    <th class="text-center">Total Líquido</th>
                                    <th class="text-center">Finalizar Compra</th> 
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="table-active"><!--Conteudo da linha de resumo do total geral-->
                                    <td class="text-center"><?php echo ($resultado_busca->num_rows) ?></td>
                                    <td class="text-center"><?php echo $array_total['dist']?></td>
                                    <td class="text-center">R$ <?php echo $array_total['total_geral'] ?></td>
                                    <td class="text-center">R$ 0.00</td>
                                    <td class="text-center">R$ <?php echo $array_total['total_geral'] ?></td>
                                    <td class="text-center"><button name="btn_finaliza" class="btn btn-outline-dark mt-auto" onclick="finaliza_compra(this.value)" value="<?php echo $resultado_busca->num_rows?>">Finalizar Compra</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </section>
    </main>    

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function atualizaIconeCarrinho(produto){
            var ajax = AjaxF();
            var prod = produto;
            ajax.onreadystatechange = function(){
                if(ajax.readyState == 4){
                    document.getElementById('num_carrinho').innerHTML = ajax.responseText;
                }
            }
            ajax.open("GET", "carrinho_backend.php?atualizaIconeCarrinho="+prod);
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
        }
        atualizaIconeCarrinho();

        function atualizaListaProdutos(produto){
            location.reload(); //atualizar pagina
        }

        function adicionar(cod_produto){
            var ajax = AjaxF();
            var produto = cod_produto;
            ajax.onreadystatechange = function(){
                var resultado = ajax.responseText;
                if(ajax.readyState == 4){
                    if (resultado.includes("nao possui estoque")){
                        alert("Produto não mais possui estoque");
                    }
                    if(resultado.includes("add +1 no carrinho final")){
                        atualizaListaProdutos(produto);
                    }
                    location.reload();
                }
            }
            ajax.open("GET", "carrinho_backend.php?add_qtd_prod="+produto);
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
        }

        function diminuir(cod_produto){
            var ajax = AjaxF();
            var produto = cod_produto;
            ajax.onreadystatechange = function(){
                var resultado = ajax.responseText;
                if(ajax.readyState == 4){
                    if (resultado.includes("sub -1 no carrinho final")){
                        atualizaListaProdutos(produto);
                    }
                    if (resultado.includes('deletando produto do carrinho final')){
                        atualizaListaProdutos(produto);
                    }
                    location.reload();
                }
            }
            ajax.open("GET", "carrinho_backend.php?dim_qtd_prod="+produto);
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
        }

        function excluir(cod_produto){
            var ajax = AjaxF();
            var produto = cod_produto;
            ajax.onreadystatechange = function(){
                var resultado = ajax.responseText;
                if(ajax.readyState == 4){
                    if (resultado.includes("produto excluido do carrinho final")){
                        atualizaListaProdutos(produto);
                    }
                }
            }
            ajax.open("GET", "carrinho_backend.php?excluir_prod_carrinho="+produto);
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
        }

        function finaliza_compra(num_linhas){
            var ajax = AjaxF();
            ajax.onreadystatechange = function(){
                var resultado = ajax.responseText;
                if(ajax.readyState == 4){
                    if(num_linhas > 0){
                        if (resultado.includes("CompraFinalizada")){
                            alert("Compra Finalizada, obrigado.");
                            window.location.href = "acompanha_pedidos.php";
                        }
                    }
                }
            }
            ajax.open("GET", "carrinho_backend.php?finaliza_compra=1");
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
            
        }

    
    </script>
        
    <!-- Definindo o footer padrão das páginas -->
    <?php include ('footer.php');?>
    <script>atualizaIconeCarrinho()</script>
    <!-- Nucleo Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Nucleo JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
