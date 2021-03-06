<?php
include('conexao.php');

// iniciando a sessao e definindo a variavel com o nivel de privilegio para acesso a paginas de cadastros
session_start();
$GLOBALS['ID'] = $_SESSION['id_priv'];

// selecionando os produtos em promocao
$resultado_prod = "SELECT *
                   FROM tb_produtos
                   WHERE promocao = 1";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- Nucleo do CSS e JS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/scripts.js"></script>
    </head>
    <body>
        <!-- Definindo o header padrão das páginas -->
        <?php include ('header.php');?>          

        <!-- Section-->
        <section class="py-2">
            <!-- Container que centraliza os produtos a serem mostrados-->
            <div class="container px-4 px-lg-5 mt-5">
                <!-- div que recebe e mostra os produtos e definindo o espacamento vertical-->
                <div id="conteudo" class="row gx-4 gx-lg-6 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center ">
                    <?php
                    //mostrar um card para cada valor retornado do banco, caso o retorno seja valido
                    if (($resultado_busca) AND ($resultado_busca->num_rows > 0)) {
                        while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                            echo utf8_encode('
                            <!-- div que define o espacamento horizontal-->
                            <div class="col mb-4"> 
                                <!--borda amarela para produtos em promocao-->
                                <div class="card h-100 border border-warning"> 
                                    <!-- Foto do Produto-->
                                    <img src="'.$row_produtos['foto'].'" alt="Foto do produto:'.utf8_decode($row_produtos['descricao']).'" />
                                    <!-- Py-4 define o comprimento do card -->
                                    <div class="card-body py-4 text-center">
                                        <!-- Nome do Produto-->
                                        <!--"substr" controla a quantidade de caracteres apresentados, "strtoupper" converte para caixa alta-->
                                        <h6 class="fw-bolder">'.strtoupper(utf8_decode('PROMOÇÃO: ').substr( utf8_decode($row_produtos['descricao']), 0, 40) ).'</h6>
                                        <!-- Preco do Produto-->
                                        <div clas="row">
                                            <br>
                                            <strike>R$ '.(string)($row_produtos['preco_venda']*1.5.'.00').'</strike> <!--Valor antes do desconto-->
                                            <br>
                                            <i class="bi bi-bookmark-star"></i> 
                                            R$ '.$row_produtos['preco_venda'].'
                                        </div>
                                    </div>                                   
                                    <!-- Botoes de acao do card com o uso de icones-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                        <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_prod'].' "><i class="bi bi-bag-plus"></i></button>
                                        <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_prod'].'"><i class="bi bi-bag-dash"></i></button>
                                    </div>
                                </div>
                            </div>');
                        }
                    }
                    ?>
                </div>
            </div> <!-- Fim do container que centraliza os produtos a serem mostrados-->
        </section> <!-- Fim da section-->
        <!-- Definindo o footer padrão das páginas -->
        <?php include ('footer.php');?>
        <!-- Nucleo Bootstrap JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Nucleo JS-->
        <script src="js/scripts.js"></script>
        <!--Funcoes javaScripts-->
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

            function adicionar(cod_produto){
                var ajax = AjaxF();
                var produto = cod_produto;
                ajax.onreadystatechange = function(){
                    var resultado = ajax.responseText;
                    if(ajax.readyState == 4){
                        if (resultado.includes("nao possui estoque")){
                            alert("Produto não mais possui estoque");
                            atualizaIconeCarrinho(produto);
                        }
                        if(resultado.includes("add +1")){
                            alert("Adicionado +1");
                            atualizaIconeCarrinho(produto);
                        }
                        if(resultado.includes("Produto add ao carrinho")){
                            alert("Produto adicionado ao carrinho");
                            atualizaIconeCarrinho(produto);
                        }
                    }
                }
                ajax.open("GET", "carrinho_backend.php?adicionar_produto="+produto);
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
                        if (resultado.includes("sub -1")){
                            alert("Retirando -1 do carrinho");
                            atualizaIconeCarrinho(produto);
                        }
                        if (resultado.includes("deletando produto do carrinho")){
                            atualizaIconeCarrinho(produto);
                        }
                    }
                }
                ajax.open("GET", "carrinho_backend.php?diminuir_produto="+produto);
                ajax.setRequestHeader("Content-Type", "text/html");
                ajax.send();
            }
            atualizaIconeCarrinho()
        </script>
    </body>
</html>