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
        <script src="js/scripts.js"></script>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?version=2" rel="stylesheet" />
    </head>
    <body>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div id="conteudo" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) {
                        while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                            echo utf8_encode(
                            '<div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Foto do Produto-->
                                    <img src="'.$row_produtos['foto'].'" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Nome do Produto-->
                                            <h5 class="fw-bolder">'.($row_produtos['descricao']).'</h5>
                                            <!-- Preco do Produto-->
                                            R$ '.$row_produtos['preco_venda'].'
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar ao Carrinho</a></div>
                                    </div>
                                </div>
                            </div>');}
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