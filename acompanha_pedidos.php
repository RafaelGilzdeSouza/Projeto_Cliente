<?php
include('conexao.php');
//selecionando os produtos em promocao
$resultado_prod = "select * from tb_acompanhamentos";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
session_start();
//definindo o nivel de privilegio para acesso a paginas de cadastros
$GLOBALS['ID'] = $_SESSION['id_priv'];
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
                <!-- div que recebe e mostra os produtos e define o espacamento vertical-->
                <div id="conteudo_acompanhamento" class="row gx-4 gx-lg-6 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center ">
                <table class="table">
                        <thead>
                            <tr><!--Linha do cabecalho da tabela-->
                                <th class="text-center">Cod. Pedido.</th>
                                <th class="text-center">Descrição do Produto</th>
                                <th class="text-center">Valor Unitário</th>
                                <th class="text-center">Qtd</th>
                                <th class="text-center">Valor Total Pedido</th>
                                <th class="text-center">Status Pedido</tr>
                        </thead>
                        <tbody><!--Estrutura das linhas da tabela-->
                            <?php
                                if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) { // o valor é valido? (sim)
                                    while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
                                        echo utf8_encode('
                                        <tr class="table-active "> 
                                            <td class="text-center">'.$row_produtos['id_pedido'].'</td>
                                            <!--"substr" controla a quantidade de caracteres apresentados-->
                                            <td class="text-center">'.substr( utf8_decode($row_produtos['descricao']),0,50).'</td>
                                            <td class="text-center">R$ '.$row_produtos['valor_unitario'].'</td>
                                            <td class="text-center">'.$row_produtos['qtd_comprada'].'</td>
                                            <td class="text-center">R$ '.$row_produtos['valor_total_venda'].'</td>
                                            <td>
                                            <div class="p-4 pt-0 border-top-0 bg-transparent text-center text-nowrap" style="padding-bottom: 12px;width: 208px;height: 44px;">
                                            '.$row_produtos['status_compra'].'
                                            </div>
                                            </td>
                                        </tr>'
                                        );
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
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
        
    </body>
</html>