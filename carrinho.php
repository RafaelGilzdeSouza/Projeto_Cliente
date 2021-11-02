// teste https://www.portugal-a-programar.pt/forums/topic/11615-php-carrinho-de-compras/
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
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-1">
            <a class="navbar-brand me-0" href="home.php">Eletronics Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Compras</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-5" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a name="link_cadastro_usuario" class="dropdown-item"
                                    href="cadastros_usuarios.php">Usuários</a></li>
                            <li><a name="link_cadastro_fornecedor" class="dropdown-item"
                                    href="cadastros_fornecedores.php">Fornecedores</a></li>
                            <li><a name="link_cadastro_produto" class="dropdown-item"
                                    href="cadastros_produtos.php">Produtos</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-0" type="text" placeholder="Buscar">
                    <button class="btn btn-primary me-2" type="button">Buscar</button>
                </form>
            </div>
            <form class="d-flex">
                <button class="btn btn-outline-dark " type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
        </div>
    </nav>
  

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
