<?php
include('conexao.php');
$resultado_prod = "select cod_produto, descricao, valor_unitario_prod, qtd_comprada, valor_total from tb_carrinho;";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);

$query_total_geral = 'select sum(valor_total) as total_geral, (select razaoSocial from tb_fornecedor where cod_forn = 1) as dist from tb_carrinho;';
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
                <div class="col-md-12"> <!--Div dos produtos-->
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active"><!--Linha do cabecalho da tabela-->
                                <th>Cod. Prod.</th>
                                <th>Descricao</th>
                                <th>Valor Unitario</th>
                                <th>Qtd</th>
                                <th>Valor Total</th>
                                <th>Alterar Quantidade</th>
                            </tr>
                        </thead>
                        <tbody><!--Estrutura das linhas da tabela-->
                        <?php
                            if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) { // o valor é valido? (sim)
                                while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                                    echo utf8_encode('
                                    <tr class="table-active"><!--Conteudo da linha do produto 1-->
                                        <td>'.$row_produtos['cod_produto'].'</td>
                                        <td>'.$row_produtos['descricao'].'</td>
                                        <td>'.$row_produtos['valor_unitario_prod'].'</td>
                                        <td>'.$row_produtos['qtd_comprada'].'</td>
                                        <td>'.$row_produtos['valor_total'].'</td>
                                        <td>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                            <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_produto'].'">+</button>
                                            <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_produto'].'">-</button>
                                            <button name="btn_excluir" class="btn btn-outline-dark mt-auto" onclick="excluir(this.value)" value="'.$row_produtos['cod_produto'].'">x</button>
                                        </div>
                                        </td>
                                    </tr>'
                                    );
                                }
                            }
                        ?>
                        </tbody>
                        <thead>
                            <tr class="table-active"><!--Linha do cabecalho da tabela-->
                                <th><th><th><th><th><th> <!--Linha/divisoria com os 6 campos em branco-->
                            </tr>
                        </thead>
                        <tbody><!--Estrutura da linha de resumo do total geral-->
                            <tr><!--Cabecalho da linha de resumo do total geral-->
                                <th>Itens dist.</th>
                                <th>Fornecedor</th>
                                <th>Total Bruto</th>
                                <th>Total Desconto</th>
                                <th>Total Líquido</th>
                                <th>Observações finais</th>
                            </tr>
                            <tr class="table-active"><!--Conteudo da linha de resumo do total geral-->
                                <td><?php echo ($resultado_busca->num_rows) ?></td>
                                <td><?php echo $array_total['dist']?></td>
                                <td><?php echo $array_total['total_geral'] ?></td>
                                <td>R$ 0,00</td>
                                <td><?php echo $array_total['total_geral'] ?></td>
                                <td>Não há observações.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                    if (resultado.includes("deletando produto do carrinho final")){
                        atualizaListaProdutos(produto);
                    }
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
