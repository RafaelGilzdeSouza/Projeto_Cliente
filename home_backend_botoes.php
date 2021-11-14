<?php 
include('conexao.php');
$grupo = $_GET['grupo'];
$fabricante = $_GET['fabricante'];

if($fabricante !=''){ //filtra o fabricante? (sim)
    $resultado_prod = "SELECT * 
                       FROM tb_produtos 
                       WHERE fabricante ='$fabricante' AND grupo = '$grupo'";
}
else{ //filtra o fabricante? (nao, apenas o grupo)
    if($grupo !=''){
        $resultado_prod = "SELECT * 
                           FROM tb_produtos 
                           WHERE grupo = '$grupo'";
    }else{ //filtra o fabricante? (nao, nem o grupo. Mostre TODOS os produtos sem filtro)
        $resultado_prod = "SELECT * 
                           FROM tb_produtos 
                           ORDER BY grupo DESC";
    }
}

$resultado_busca = $mysqli->query($resultado_prod) or die("Falha na execução do código SQL: " . $mysqli->error);
if (($resultado_busca) AND ($resultado_busca->num_rows != 0)) { //o retorno é valido? (sim)
    while($row_produtos = mysqli_fetch_assoc($resultado_busca)){
        if($row_produtos['promocao'] == 1){ //o produto está em promocao? (sim, entao sinalizar de amarelo)
            echo utf8_encode('
                <!-- div que define o espacamento horizontal-->
                <div class="col mb-4"> 
                    <!--borda amarela para produtos em promocao-->
                    <div class="card h-100 border border-warning"> <!--Borda Amarela-->
                        <!-- Foto do Produto-->
                        <img src="'.$row_produtos['foto'].'" alt="Foto do produto:'.utf8_decode($row_produtos['descricao']).'"  />
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
        }else{ //o produto está em promocao? (nao, entao sinalizar de azul)
            echo utf8_encode('
            <!-- div que define o espacamento horizontal-->
            <div class="col mb-4">
                <div class="card h-100 border border-primary"> <!--Borda Azul-->
                    <!-- Foto do Produto-->
                    <img src="'.$row_produtos['foto'].'" alt="Foto do produto:'.utf8_decode($row_produtos['descricao']).'"  />
                    <!-- div card e Py-4 define o comprimento do card-->
                    <div class="card-body py-4 text-center">
                        <!-- Nome do Produto-->
                        <!--"substr" controla a quantidade de caracteres apresentados, "strtoupper" converte para caixa alta-->
                        <h6 class="fw-bolder">'.strtoupper(substr( utf8_decode($row_produtos['descricao']), 0, 39) ).'</h6>
                        <br><br>
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
    }
}else{ //o retorno é valido? (nao)
    echo utf8_encode('<p class="lead fw-normal text-white-50 mb-0">Produto não encontrado :(</p>');}
?>