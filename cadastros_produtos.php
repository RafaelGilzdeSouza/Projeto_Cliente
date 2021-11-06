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
        <title>Cadastro de Produtos</title>
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
        <?php include ('header.php');?>
        
        <!-- Formulário abaixo-->
        <div class="container">
            <form method="POST" action="produtos_backend.php">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Descrição*</label>
                        <input type="text" name="descricao_produto" id="descricao_produto" class="form-control" maxlength="200" placeholder="Descrição completa do produto">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fabricante</label>
                        <input type="text" name="fabricante" id="fabricante" class="form-control" maxlength="200" placeholder="Fabricante do produto">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Cód. de Barras</label>
                        <input type="text" name="cod_barras" id="cod_barras" class="form-control" maxlength="50" placeholder="Código de Barras">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Custo*</label>
                        <input type="text" name="preco_custo" id="preco_custo" class="form-control" placeholder="Preço de custo">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Margem %*</label>
                        <input type="text" name="margem_lucro" id="margem_lucro" class="form-control" placeholder="Margem de lucro">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Venda</label>
                        <input type="text" name="preco_venda" id="preco_venda" class="form-control" placeholder="Preço de venda">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Estoque</label>
                        <input type="text" name="estoque" id="estoque" class="form-control" placeholder="Estoque atual">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Grupo</label>
                        <select name="grupo" id="grupo" class="form-select" aria-label="Disabled select example">
                            <option selected>Selecione</option>
                            <option value="Celulares">Celulares</option>
                            <option value="Computadores">Computadores</option>
                            <option value="Câmeras">Câmeras</option>
                            <option value="Tablets">Tablets</option>
                            <option value="TV's">TV's</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Foto</label>
                        <input type="text" name="foto" id="foto" class="form-control" maxlength="250" placeholder="Link da imagem">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Data últ. Entrega</label>
                        <input type="text" name="data_ult_entrega" id="data_ult_entrega" class="form-control" placeholder="Data">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fornecedor</label>
                        <input type="text" name="forn_ult_entrega" id="forn_ult_entrega" class="form-control" placeholder="Forn. últ. Entrega">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Promoção</label>
                        <select name="promocao" id="promocao" class="form-select" aria-label="Disabled select example">
                            <option selected>Selecione</option>
                            <option value=0>0</option>
                            <option value=1>1</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Curva ABC</label>
                        <select name="curvaABC" id="curvaABC" class="form-select" aria-label="Disabled select example">
                            <option selected>Selecione</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <button name="btn_cadastrar_produtos" id="btn_cadastrar_produtos" type="submit" class="btn btn-primary">Cadastrar </button>
                        <a href="cadastros_produtos.php" name="btn_limpar_cadastro_produtos" id="btn_limpar_cadastro_produtos" type="submit" class="btn btn-warning">Limpar </a>
                        <button name="btn_excluir_cadastro_produtos" id="btn_excluir_cadastro_produtos" type="submit" class="btn btn-danger">Excluir </button>
                    </div>
                </div>
            </form>
        </div>


        <!-- Definindo o footer padrão das páginas -->
        <?php include ('footer.php');?>
        
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
        atualizaIconeCarrinho()
        </script>
    </body>
</html>
