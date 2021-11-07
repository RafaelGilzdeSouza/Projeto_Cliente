<?php
include('conexao.php');
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
    <!-- Incluindo o header padrão das páginas -->
    <?php include('header.php'); ?>

    <!-- Formulário-->
    <div class="formulario fieldset px-4 px-lg-5">
        <form method="POST" action="usuarios_backend.php">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Nome*</label>
                    <input type="text" name="nome" id="nome" class="form-control" maxlength="100" placeholder="Nome completo">
                </div>
                <div class="form-group form_margin col-md-5">
                    <label>Login*</label>
                    <input type="text" name="login" id="login" class="form-control" maxlength="20" placeholder="Login de acesso">
                </div>
                </div>



                <div class="form-row">
                <div class="form-group col-md-5">
                    <label>CPF*</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" minlength="14" maxlength="14" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');">
                </div>
                <div class="form-group form_margin col-md-5">
                    <label>CEP*</label>
                    <input type="text" name="cep" id="cep" class="form-control" minlength="9" maxlength="9" placeholder="CEP" onkeypress="$(this).mask('00000-000');">
                </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" class="form-control" maxlength="200" placeholder="Rua">
                </div>
                <div class="form-group form_margin col-md-5">
                    <label>Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" maxlength="6" placeholder="Nº do imóvel">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15" placeholder="Telefone" onkeypress="$(this).mask('(00)0.0000-0000');">
                </div>
                <div class="form-group form_margin col-md-5">
                    <label>E-mail</label>
                    <input type="text" name="email" id="email" class="form-control" maxlength="100" placeholder="E-mail para contato">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Senha*</label>
                    <input type="password" name="senha" id="senha" class="form-control" maxlength="20" placeholder="Senha de acesso">
                </div>
                <div class="form-group form_margin col-md-5">
                    <label>Permissão*</label>
                    <input type="text" name="permissao" id="permissao" class="form-control" onkeypress="$(this).mask('0');" placeholder="Qual o nível de Acesso">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group">
                    <button name="btn_cadastrar_usuario" id="btn_cadastrar_usuario" type="submit" class="btn btn-primarycad">Cadastrar </button>
                    <a href="cadastros_usuarios.php" name="btn_limpar_cadastro_usuario" id="" type="submit" class="btn btn-warning">Limpar </a>
                    <button name="btn_excluir_cadastro_usuario" id="btn_excluir_cadastro_usuario" type="submit" class="btn btn-danger">Excluir </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Definindo o footer padrão das páginas -->
 <?php include('footer.php'); ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function atualizaIconeCarrinho(produto) {
            var ajax = AjaxF();
            var prod = produto;
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4) {
                    document.getElementById('num_carrinho').innerHTML = ajax.responseText;
                }
            }
            ajax.open("GET", "carrinho_backend.php?atualizaIconeCarrinho=" + prod);
            ajax.setRequestHeader("Content-Type", "text/html");
            ajax.send();
        }
        atualizaIconeCarrinho()
    </script>
</body>

</html>