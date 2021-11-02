<html>
    <?php echo "'";?>
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
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                    <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                        <li><button name="Celulares-Samsung" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares-Samsung" >Samsung</button></li>
                        <li><button name="Celulares_Apple" class="dropdown-item"  onclick="AlteraConteudoDrop(this.value);" value="Celulares-Apple" >Apple</button></li>
                        <li><button name="Celulares_Todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Televisores</a>
                    <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                        <li><button name="Tvs_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-Sony" >Sony</button></li>
                        <li><button name="Tvs_lg" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-LG" >LG</button></li>
                        <li><button name="Tvs_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tablets</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="tablets_xiaomi" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Xiaomi" >Xiaomi</button></li>
                        <li><button name="tablets_apple" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Apple" >Apple</button></li>
                        <li><button name="tablets_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Câmeras</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="cameras_canon" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Canon" >Canon</button></li>
                        <li><button name="cameras_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Sony" >Sony</button></li>
                        <li><button name="cameras_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras" >Ver todos</button></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle me-4" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outros</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button name="outros_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="todos" >Ver todos</button></li>
                    </ul>
                </li>
            
                <li class="nav-item dropdown">
                    <form class="d-flex">
                        <input name="input_produtos" id="input_produtos" type="text" class="form-control me-0" placeholder="Buscar">
                        <button name="btn_buscar_produtos" id="btn_buscar_produtos" type="button" onclick="AlteraConteudo()" class="btn btn-primary me-2">Buscar</button>
                    </form>
                </li>
                
                <li class="nav-item dropdown">
                    <form action="carrinho.php">
                    <button name="btn_carrinho" id="btn_carrinho" class="btn btn-outline-dark " type="submit">
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

    <!-- Header-->
    <header class="bg-dark py-1">
        <!--Container para centralizar o header-->
        <div class="container px-lg-5 my-4">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Eletronics Store</h1>
                <p class="lead fw-normal text-white-50 mb-0">Economize seu dinheiro comprando conosco!</p>
            </div>
        </div> <!--Fim do container para centralizar o header-->
    </header><?php  echo "'";?>
</html>
