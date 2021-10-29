<?php
//inclui a conexao
include('conexao.php');

$produtos = filter_unput(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//oesquisa no bd o nome do prod ref 
$resultado_prod = "select * from tb_produtos where descricao like '%$produtos%'";
$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);

if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) {
	while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
        echo 
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
        </div>';}
}else{
echo "produto nao encontrado.";}

?>
