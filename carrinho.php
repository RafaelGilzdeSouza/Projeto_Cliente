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
                            <div name="num_carrinho" id="num_carrinho" class="num_carrinho">0</div>
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
    <!-- Carrinho abaixo-->

    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <br>
                    <br>
                    <h2>Carrinho de Compras</h2>
                    <br>
                    <br>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="card">
                                <div class="items">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3">

                                                <img class="img-fluid mx-auto d-block image" src="img/logo.png">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a href="#">produto 1</a>
                                                                <div class="product-info">
                                                                    <div>Display: <span class="value">5 inch</span>
                                                                    </div>
                                                                    <div>RAM: <span class="value">4GB</span></div>
                                                                    <div>Memory: <span class="value">32GB</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 quantity">
                                                            <label for="quantity">Quantity:</label>
                                                            <input id="quantity" type="number" value="1"
                                                                class="form-control quantity-input">
                                                        </div>
                                                        <div class="col-md-3 price">
                                                            <br>
                                                            <span>$120</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="card h-auto" style="width:200px;">
                                <div class="summary">
                                    
                                    <h3>Total</h3>
                                    <div class="summary-item"><span class="text">SubTotal:  </span><span
                                            class="price">$360</span></div>
                                            <br>

                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Confirmar Compra</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
-->


    

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
