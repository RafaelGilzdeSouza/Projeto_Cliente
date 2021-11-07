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
        <title>Cadastros de Fornecedores</title> 
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
        <div class="formulario fieldset px-4 px-lg-5">
            <form method="POST" action="fornecedores_backend.php">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Razão Social</label>
                        <input type="text" name="razaosocial" id="razaosocial" class="form-control" maxlength="100" placeholder="Razão Social da Empresa">
                    </div>
                    <div class="form-group form_margin col-md-5">
                        <label>CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control" minlength="18" maxlength="18" placeholder="CNPJ" onkeypress="$(this).mask('00.000.000/0000-00');">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>CEP</label>
                        <input type="text" name="cep_empresa" id="cep_empresa" class="form-control" minlength="9" maxlength="9" placeholder="CEP" onkeypress="$(this).mask('00000-000');">
                    </div>
                    <div class="form-group form_margin col-md-5">
                        <label>Rua</label>
                        <input type="text" name="rua_empresa" id="rua_empresa" class="form-control" maxlength="200" placeholder="Rua">
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" maxlength="20" placeholder="Bairro">
                    </div>
                    <div class="form-group form_margin col-md-5">
                        <label>Número</label>
                        <input type="text" name="numero_empresa" id="numero_empresa" class="form-control" maxlength="6" placeholder="Nº do imóvel">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" maxlength="20" placeholder="Cidade">
                    </div>
                    <div class="form-group form_margin col-md-2">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-select" aria-label="Disabled select example">
                            <option selected>Selecione</option>
                            <option value="1">SP</option>
                            <option value="1">PR</option>
                            <option value="1">SC</option>
                            <option value="1">RS</option>
                            <option value="1">MS</option>
                            <option value="1">RO</option>
                            <option value="1">AC</option>
                            <option value="1">AM</option>
                            <option value="1">RR</option>
                            <option value="1">PA</option>
                            <option value="1">AP</option>
                            <option value="1">TO</option>
                            <option value="1">MA</option>
                            <option value="1">RN</option>
                            <option value="1">PB</option>
                            <option value="1">PE</option>
                            <option value="1">AL</option>
                            <option value="1">SE</option>
                            <option value="1">BA</option>
                            <option value="1">MG</option>
                            <option value="1">RJ</option>
                            <option value="1">MT</option>
                            <option value="1">GO</option>
                            <option value="1">DF</option>
                            <option value="1">PI</option>
                            <option value="1">CE</option>
                            <option value="1">ES</option>
                        </select>
                    </div>
                    <div class="form-group form_margin col-md-2">
                        <label>Status</label>
                        <select name="status" id="status" class="form-select" aria-label="Disabled select example">
                            <option selected>Selecione</option>
                            <option value="0">Ativo</option>
                            <option value="1">Inativo</option>
                        </select>
                    </div>
                   
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15" placeholder="Telefone" onkeypress="$(this).mask('(00)0.0000-0000');">
                    </div>
                    <div class="form-group form_margin col-md-5">
                        <label>E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" maxlength="100" placeholder="E-mail para contato">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <button name="btn_cadastrar_fornecedores" id="btn_cadastrar_fornecedores" type="submit" class="btn btn-primarycad">Cadastrar </button>
                        <a href="cadastros_fornecedores.php" name="btn_limpar_cadastro_fornecedores" id="btn_limpar_cadastro_fornecedores" type="submit" class="btn btn-warning">Limpar </a>
                        <button name="btn_excluir_cadastro_fornecedores" id="btn_excluir_cadastro_fornecedores" type="submit" class="btn btn-danger">Excluir </button>
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
