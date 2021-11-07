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
            if($row_produtos['promocao'] == 1){
                echo utf8_encode('
                <!-- div que define o espacamento horizontal-->
                <div class="col mb-4">
                    
                    <div class="card h-100 border border-warning">
                        <!-- Foto do Produto-->
                        <img src="'.$row_produtos['foto'].'" alt="..." />
                        
                        <!-- div card e Py-4 define o comprimento do card-->
                        <div class="card-body py-4 text-center">
                            <!-- Nome do Produto-->
                            <h6 class="fw-bolder">'.('PROMOCAO: '.$row_produtos['descricao']).'</h6>
                            <i class="bi bi-bookmark-star"></i>
                            
                            <!-- Preco do Produto-->
                            R$ '.$row_produtos['preco_venda'].'
                        </div>
                        
                        <!-- Botoes de acao do card-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_prod'].'"><i class="bi bi-bag-plus" ></i></button>
                        <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_prod'].'"><i class="bi bi-bag-dash" ></i></button>
                        </div>
                    </div>
                </div>');
            }else{
                echo utf8_encode('
                <!-- div que define o espacamento horizontal-->
                <div class="col mb-4">
                    
                    <div class="card h-100 border border-primary">
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
                        <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_prod'].'"><i class="bi bi-bag-plus" ></i></button>
                        <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_prod'].'"><i class="bi bi-bag-dash" ></i></button>
                        </div>
                    </div>
                </div>');
            }
            ;}
    }else{
    echo utf8_encode('<p class="lead fw-normal text-white-50 mb-0">Produto não encontrado :(</p>');}

?>