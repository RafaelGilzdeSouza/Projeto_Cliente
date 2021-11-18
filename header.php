<script>
    function confere_permissao(pagina){ //verificacao de permissao para as paginas de cadastros. "pagina" = botao da respectiva pagina
        if(<?php echo ($GLOBALS['ID'])?> > 1){ //tem permissao? (nao)
            alert("Acesso negado, consulte o(a) administrador(a) do site para mais informações.");
        }else{ //tem permissao? (sim)
            if(pagina == 'Usuários'){
                window.location.href = "cadastros_usuarios.php";
            }else if(pagina == 'Fornecedores'){
                window.location.href = "cadastros_fornecedores.php";
            }else if(pagina == 'Produtos'){
                window.location.href = "cadastros_produtos.php";
            }
        }
    }
</script>

<html>
    <head>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border border-top-0">
        <!--centralizar a navbar-->

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"> <!--Logo da empresa-->
            <li class="nav-item">
                <a class="navbar-brand me-0" href="home.php">Eletronics Store</a>
            </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"> <!--Paginas de cadastro, botoes de filtros, filtro buscar, carrinho e area do usuario-->
            <li class="nav-item">
                <a class="nav-link active" style="margin-right: 10px;" aria-current="page" href="home.php">Compras</a>
            </li>
            
            <?php //mostre os botoes de cadastro apenas se o usuario tiver permissao
            if(($GLOBALS['ID']) == 1){?>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle me-4" style="margin-right: 10px;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <input type="button" class="dropdown-item" onclick="confere_permissao(this.value)" value="Usuários" />
                        <input type="button" class="dropdown-item" onclick="confere_permissao(this.value)" value="Fornecedores" />
                        <input type="button" class="dropdown-item" onclick="confere_permissao(this.value)" value="Produtos" />
                    </ul>
                </li>
            <?php }?>
        
            <li class="nav-item dropdown"> <!--Filtros dos celulares-->
                <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Celulares</a>
                <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
                    <li><button name="Celulares-Samsung" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares-Samsung" >Samsung </button></li>
                    <li><button name="Celulares_Apple" class="dropdown-item"  onclick="AlteraConteudoDrop(this.value);" value="Celulares-Apple" >Apple</button></li>
                    <li><button name="Celulares_Todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Celulares" >Ver todos</button></li>
                </ul>
            </li>
            <li class="nav-item dropdown"> <!--Filtros das TVs-->
                <a class="nav-link active dropdown-toggle" style="margin-right: 10px;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Televisores</a>
                <ul class="dropdown-menu" value="teste" aria-labelledby="navbarDropdown">
                    <li><button name="Tvs_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-Sony" >Sony</button></li>
                    <li><button name="Tvs_lg" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs-LG" >LG</button></li>
                    <li><button name="Tvs_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tvs" >Ver todos</button></li>
                </ul>
            </li>
            <li class="nav-item dropdown"> <!--Filtros dos tablets-->
                <a class="nav-link active dropdown-toggle" style="margin-right: 10px;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tablets</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><button name="tablets_xiaomi" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Xiaomi" >Xiaomi</button></li>
                    <li><button name="tablets_apple" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets-Apple" >Apple</button></li>
                    <li><button name="tablets_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Tablets" >Ver todos</button></li>
                </ul>
            </li>
            <li class="nav-item dropdown"> <!--Filtros das cameras-->
                <a class="nav-link active dropdown-toggle" style="margin-right: 10px;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Câmeras</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><button name="cameras_canon" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Canon" >Canon</button></li>
                    <li><button name="cameras_sony" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras-Sony" >Sony</button></li>
                    <li><button name="cameras_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="Câmeras" >Ver todos</button></li>
                </ul>
            </li>
            <li class="nav-item dropdown"> <!--Mostrar todos os produtos sem filtro-->
                <a class="nav-link active dropdown-toggle me-4" style="margin-right: 10px;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outros</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><button name="outros_todos" class="dropdown-item" onclick="AlteraConteudoDrop(this.value);" value="todos" >Ver todos</button></li>
                </ul>
            </li>        
            <li class="nav-item dropdown"> <!--Filtro digitado pelo usuario-->
                <form class="d-flex">
                    <input name="input_produtos" id="input_produtos" type="text" class="form-control me-0" placeholder="Buscar">
                    <button name="btn_buscar_produtos" id="btn_buscar_produtos" type="button" onclick="AlteraConteudo()" class="btn btn-primary me-2"><i class='bx bx-search-alt'></i></button>
                </form>
            </li>            
            <li class="nav-item dropdown"> <!--Icone do carrinho com valor 0 como padrao-->
                <a name="btn_carrinho" id="btn_carrinho" href="carrinho.php" class="btn btn-outline-dark " >
                    <img src="img/shopcart2.ico" style="height: 18px;" alt="logo">
                    <span class="badge bg-dark text-white ms-1 badge-pill">
                        <div name="num_carrinho" id="num_carrinho" class="num_carrinho">0</div>
                    </span>
                </a>
            </li>            
            <li class="nav-item dropdown"> <!--Area do usuario-->
                <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-user-circle bx-sm'> <?php echo ucfirst($_SESSION['login']);?></i> </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
                    <li>
                        <a name="btn_config" class="dropdown-item" href="acompanha_pedidos.php" value="Exibir alerta"><i class="bi bi-journal-check"></i> Acompanhar Pedidos</a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5549991227987"><button name="btn_ajuda" class="dropdown-item" value="click here" ><i class="bi bi-chat-dots"></i> Suporte 24h </button></a>
                    </li>         
                    <li class="nav-item dropdown"> <!--Botao Logoff-->
                        <form action="logout.php">
                            <button name="btn_logoff" id="btn_logoff" class="dropdown-item" type="auto"><i class='bx bx-door-open' ></i> Logoff</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav> <!--Fim do navbar-->
    <!-- Header-->
    <header class="bg-dark py-1" style="margin-top: 40px;">
        <!--Container para centralizar o header-->
        <div class="container px-lg-5 my-4">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Eletronics Store</h1>
                <p class="lead fw-normal text-white-50 mb-0">Economize seu dinheiro comprando conosco!</p>
            </div>
        </div> <!--Fim do container para centralizar o header-->
    </header>
            
</html>