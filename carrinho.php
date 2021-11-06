<?php
include('conexao.php');
$resultado_prod = "select cod_produto, descricao, valor_unitario_prod, qtd_comprada, valor_total from tb_carrinho;";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);

$query_total_geral = 'select sum(valor_total) as total_geral, (select razaoSocial from tb_fornecedor where cod_forn = 1) as dist from tb_carrinho;';
$resultado_total_geral = $mysqli->query($query_total_geral) or die("Falha na execução do código SQL: " . $mysqli->error);
$array_total = mysqli_fetch_assoc($resultado_total_geral);

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!--Container para centralizar a navbar-->
        <div class="container px-4 px-lg-1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="navbar-brand me-0" href="home.php">Eletronics Store</a>
                </li>
            </ul>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Compras</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle me-4" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a name="link_cadastro_usuario" class="dropdown-item" href="cadastros_usuarios.php">Usuários</a></li>
                        <li><a name="link_cadastro_fornecedor" class="dropdown-item" href="cadastros_fornecedores.php">Fornecedores</a></li>
                        <li><a name="link_cadastro_produto" class="dropdown-item" href="cadastros_produtos.php">Produtos</a></li>
                    </ul>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle disabled" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                    <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                        <li><button name="Celulares-Samsung" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares-Samsung" >Samsung</button></li>
                        <li><button name="Celulares_Apple" class="dropdown-item"  onclick="AlteraConteudoDrop(this.value);" value="Celulares-Apple" >Apple</button></li>
                        <li><button name="Celulares_Todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle disabled" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Televisores</a>
                    <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                        <li><button name="Tvs_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-Sony" >Sony</button></li>
                        <li><button name="Tvs_lg" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-LG" >LG</button></li>
                        <li><button name="Tvs_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle disabled" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tablets</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="tablets_xiaomi" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Xiaomi" >Xiaomi</button></li>
                        <li><button name="tablets_apple" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Apple" >Apple</button></li>
                        <li><button name="tablets_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle disabled" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Câmeras</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="cameras_canon" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Canon" >Canon</button></li>
                        <li><button name="cameras_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Sony" >Sony</button></li>
                        <li><button name="cameras_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle me-4 disabled" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outros</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="outros_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="todos" >Ver todos</button></li>
                    </ul>
                </li>
            
                <li class="nav-item dropdown">
                    <form class="d-flex">
                        <input name="input_produtos" id="input_produtos" type="text" class="form-control me-0 disabled" placeholder="Buscar">
                        <button name="btn_buscar_produtos" id="btn_buscar_produtos" type="button" class="btn btn-primary me-2 disabled">Buscar</button>
                    </form>
                </li>
                
                <li class="nav-item dropdown">
                    <form action="carrinho.php">
                    <button name="btn_carrinho" id="btn_carrinho" class="btn btn-outline-dark disabled" type="submit">
                        <img src="img/shopcart2.ico" style="height: 18px;" alt="logo">
                        <span class="badge bg-dark text-white ms-1 badge-pill">
                            <div name="num_carrinho" id="num_carrinho" class="num_carrinho"></div>
                        </span>
                    </button>
                    </form>
                </li>
                
                <li class="nav-item dropdown">
                    <form action="logout.php">
                        <button name="btn_logoff" id="btn_logoff" class="btn btn-outline-dark-logoff " type="auto">
                            logoff
                        </button>
                    </form>
                </li>
            </ul>
        </div> <!--Fim do container para centralizar a navbar-->
    </nav> <!--Fim do navbar-->
    
    <!--Header-->
    <header class="bg-dark py-1">
        <!--Container para centralizar o header-->
        <div class="container px-lg-5 my-4">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Eletronics Store</h1>
                <p class="lead fw-normal text-white-50 mb-0">Economize seu dinheiro comprando conosco!</p>
            </div>
        </div> <!--Fim do container para centralizar o header-->
    </header>

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

        function diminuir(cod_produto)
        {
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
