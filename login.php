<?php

session_start();
include('conexao.php');   
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: tela_login.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "select login from tb_usuario where login = '{$usuario}' and senha =('{$senha}')";
 
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: index.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: tela_login.php');
	exit();
}




