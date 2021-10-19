
<?php 

include("conexao.php");


if(empty($_POST['usuario']) || empty($_POST['senha']) ){
    header('location:tela_login.html');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);    
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select cod_interno, tb_usuario from usuario where login = '{$usuario}' and senha = ('{$senha}') ";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
echo $row; exit();








?>

