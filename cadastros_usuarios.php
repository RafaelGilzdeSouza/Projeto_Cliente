<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cadastros de Usuários</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> 
        
        <!-- Adicionando a biblioteca jQuery Mask ao projeto -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        
        <!-- Adicionando o Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-1">
                <a class="navbar-brand me-0" href="home.php">Eletronics Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Compras</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-5" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a name="link_cadastro_usuario" class="dropdown-item" href="cadastros_usuarios.php">Usuários</a></li>
                                <li><a name="link_cadastro_fornecedor" class="dropdown-item" href="cadastros_fornecedores.html">Fornecedores</a></li>
                                <li><a name="link_cadastro_produto" class="dropdown-item" href="cadastros_produtos.html">Produtos</a></li>
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
                            <i class="bi-cart-fill me-1" ></i>
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
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
        <!-- Formulário-->
            <div class="container">
                <form method="POST" action="usuarios_backend.php">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Nome*</label>
                            <input type="text" name="nome" id="nome" class="form-control" maxlength="100" placeholder="Nome completo">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Login*</label>
                            <input type="text" name="login" id="login" class="form-control" maxlength="20" placeholder="Login de acesso">
                        </div>
                        <div class="form-group col-md-4">
                            <label>CPF*</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" minlength="14" maxlength="14" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>CEP*</label>
                            <input type="text" name="cep" id="cep" class="form-control" minlength="9" maxlength="9" placeholder="CEP" onkeypress="$(this).mask('00000-000');">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Rua</label>
                            <input type="text" name="rua" id="rua" class="form-control" maxlength="200" placeholder="Rua">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Número</label>
                            <input type="text" name="numero" id="numero" class="form-control" maxlength="6" placeholder="Nº do imóvel">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15" placeholder="Telefone" onkeypress="$(this).mask('(00)0.0000-0000');">
                        </div>
                        <div class="form-group col-md-4">
                            <label>E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" maxlength="100" placeholder="E-mail para contato">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Senha*</label>
                            <input type="password" name="senha" id="senha" class="form-control" maxlength="20" placeholder="Senha de acesso">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Permissão*</label>
                            <input type="text" name="permissao" id="permissao" class="form-control" onkeypress="$(this).mask('0');">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <button name="btn_cadastrar_usuario" id="btn_cadastrar_usuario" type="submit" class="btn btn-primary">Cadastrar </button>
                            <a href="cadastros_usuarios.php" name="btn_limpar_cadastro_usuario" id="" type="submit" class="btn btn-warning">Limpar </a>
                            <button name="" id="btn_excluir_cadastro_usuario" type="submit" class="btn btn-danger">Excluir </button>
                        </div>
                    </div>
                </form>
            </div>

        <!-- Rodapé-->
        <div class="rodape">
        <footer class="py-3 bg-dark">
            <p class="m-0 text-center text-white">Copyright &copy; Eletronics Store 2021</p>
        </footer>
    </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
