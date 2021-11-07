<?php
include('conexao.php');
$resultado_prod = "select * from tb_produtos where promocao = 1";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
session_start();
$GLOBALS['ID'] = $_SESSION['id_priv'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eletronics Store</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- Nucleo do CSS e JS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/scripts.js"></script>

    </head>
    <body>
        <!-- Definindo o header padrão das páginas -->
        <?php include ('header.php');?>          

        <p id="demo"><?php echo ($GLOBALS['ID'])?></p>
    <p id="demo2"></p>

        <!-- Section-->
        <section class="py-2">
            <!-- Container que centraliza os produtos a serem mostrados-->
            <div class="container px-4 px-lg-5 mt-5">
                <!-- div que recebe e mostra os produtos e define o espacamento vertical-->
                <div id="conteudo" class="row gx-4 gx-lg-6 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) {
                        while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                            echo utf8_encode('
                            <!-- div que define o espacamento horizontal-->
                            <div class="col mb-4">
                                <div class="card h-100">
                                    <!-- Foto do Produto-->
                                    <img src="'.$row_produtos['foto'].'" alt="..." />
                                    
                                    <!-- div card e Py-4 define o comprimento do card-->
                                    <div class="card-body py-4 text-center">
                                        <!-- Nome do Produto-->
                                        <h6 class="fw-bolder">'.($row_produtos['descricao']).'</h6>
                                        <h5 class="fw-bolder">Em Promoção</h5>
                                        <!-- Preco do Produto-->
                                        R$ '.$row_produtos['preco_venda'].'
                                    </div>
                                    
                                    <!-- Botoes de acao do card-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                        <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_prod'].'">+</button>
                                        <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_prod'].'">-</button>
                                    </div>
                                </div>
                            </div>');}
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
