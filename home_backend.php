<?php 
include('conexao.php');
$produtos = $_GET['produtos'];

if(strlen($produtos) > 1){

$resultado_prod = "select * from tb_produtos where descricao like '%$produtos%' or grupo like '%$produtos%' order by descricao asc";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
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
                <button name="btn_mais" class="btn btn-outline-dark mt-auto" onclick="adicionar(this.value)" value="'.$row_produtos['cod_prod'].'">+</button>
                <button name="btn_menos" class="btn btn-outline-dark mt-auto" onclick="diminuir(this.value)" value="'.$row_produtos['cod_prod'].'">-</button>
                </div>
            </div>
        </div>');}
}else{
    echo utf8_encode('<p class="lead fw-normal text-white-50 mb-0">Produto nao encontrado :(</p>');}
}else{
    $resultado_prod = "select * from tb_produtos where promocao = 1";
    $resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
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
            </div>');
        }
    }
}


