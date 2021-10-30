<?php 
    //teste
    include('conexao.php');
    $grupo = $_GET['grupo'];
    $fabricante = $_GET['fabricante'];

    if($fabricante !=''){
        $resultado_prod = "select * from tb_produtos where fabricante ='$fabricante' and grupo = '$grupo'";
    }else{
        if($grupo !=''){
            $resultado_prod = "select * from tb_produtos where grupo = '$grupo'";
        }else{
            $resultado_prod = "select * from tb_produtos order by grupo desc";
        }
    }
    $resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
    if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) {
        while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
            echo utf8_encode(
            '<div class="col mb-5">
                <div class="card h-100">
                    <!-- Foto do Produto-->
                    <img class="card-img-top" src="'.$row_produtos['foto'].'" alt="..." />
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
    }else{
    echo utf8_encode('<p class="lead fw-normal text-white-50 mb-0">Produto não encontrado :(</p>');}

?>