<?php
include('conexao.php');
$resultado_prod = "select * from tb_produtos where promocao = 1";
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

<<<<<<< HEAD
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?version=2" rel="stylesheet" />
    </head>
    <body>
=======

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
                                        
                                        <!-- Preco do Produto-->
                                        R$ '.$row_produtos['preco_venda'].'
                                    </div>
                                    
                                    <!-- Botoes de acao do card-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                        <button class="btn btn-outline-dark mt-auto" onclick="add_qtd('.$row_produtos['cod_prod'].')" href="#">+</button>
                                        0
                                        <button class="btn btn-outline-dark mt-auto" onclick="sub_qtd('.$row_produtos['cod_prod'].')" href="#">-</button>
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
    </body>
</html>