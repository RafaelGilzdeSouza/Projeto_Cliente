<?php 
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
            '<!-- div que define o espacamento horizontal-->
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
                     
                        <button class="btn btn-outline-dark mt-auto" onclick="sub_qtd('.$row_produtos['cod_prod'].')" href="#">-</button>
                    </div>
                </div>
            </div>');}
    }else{
    echo utf8_encode('<p class="lead fw-normal text-white-50 mb-0">Produto não encontrado :(</p>');}

?>