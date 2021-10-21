<?php
include('protect.php');
include('conexao.php');

$sql_code = "SELECT * FROM tb_produtos WHERE promocao = 1";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);


?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eletronics Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-1">
                <a class="navbar-brand me-0">Eletronics Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Compras</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-5" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="link_cadastro_usuario" class="dropdown-item" href="cadastros_usuarios.html">Usuários</a></li>
                                <li><a name="link_cadastro_fornecedor" class="dropdown-item" href="cadastros_fornecedores.html">Fornecedores</a></li>
                                <li><a name="link_cadastro_produto" class="dropdown-item" href="cadastros_produtos.html">Produtos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="filtro_celulares_samsung" class="dropdown-item" href="">Samsung</a></li>
                                <li><a name="filtro_celulares_apple" class="dropdown-item" href="">Apple</a></li>
                                <li><a name="filtro_celulares_todos" class="dropdown-item" href="">Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Televisores</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="filtro_tvs_sony" class="dropdown-item" href="">Sony</a></li>
                                <li><a name="filtro_tvs_lg" class="dropdown-item" href="">LG</a></li>
                                <li><a name="filtro_tvs_todos" class="dropdown-item" href="">Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tablets</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="filtro_tablets_xiaomi" class="dropdown-item" href="">Xiaomi</a></li>
                                <li><a name="filtro_tablets_apple" class="dropdown-item" href="">Apple</a></li>
                                <li><a name="filtro_tablets_todos" class="dropdown-item" href="">Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Câmeras</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="filtro_cameras_canon" class="dropdown-item" href="">Canon</a></li>
                                <li><a name="filtro_cameras_sony" class="dropdown-item" href="">Sony</a></li>
                                <li><a name="filtro_cameras_todos" class="dropdown-item" href="">Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outros</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="filtro_outros_todos" class="dropdown-item" href="">Ver todos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input name="input_produtos" id="input_produtos" type="text" class="form-control me-0" placeholder="Buscar">
                        <button name="btn_buscar_produtos" id="btn_buscar_produtos" type="button" class="btn btn-primary me-2">Buscar</button>
                    </form>
                </div>
                    <form action="carrinho.html">
                        <button name="btn_carrinho" id="btn_carrinho" class="btn btn-outline-dark " type="submit">
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                    <form action="logout.php">
                        <button name="btn_logoff" id="btn_logoff" class="btn btn-outline-dark-logoff " type="auto">
                            logoff
                        </button>
                   
                    </form>
                </div>
            </div>
        </nav>

        <!-- Header-->
        <header class="bg-dark py-1">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Eletronics Store</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Economize seu dinheiro comprando conosco!</p>
                </div>
            </div>
        </header>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php   
                while($row_produtos = mysqli_fetch_assoc($sql_query)){
                    echo 
                    '<div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="'.$row_produtos['foto'].'" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Nome do Produto-->
                                    <h5 class="fw-bolder">'.strtoupper($row_produtos['descricao']).'</h5>
                                    
                                    <!-- Preco do Produto-->
                                    R$ '.$row_produtos['preco_venda'].'
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar ao Carrinho</a></div>
                            </div>
                        </div>
                    </div>';                    
                }
                ?>
                    
                </div>
            </div>
        </section>

        <!-- Rodapé-->
        <footer class="py-3 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Eletronics Store 2021</p></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>