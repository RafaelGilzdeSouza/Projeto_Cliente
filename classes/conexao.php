<?php

$host = "localhost";
$user = "root";
$senha = "";
$db = "db_eletronicsstore";

$conexao = mysqli_connect($host, $user, $senha, $db) or die ("Não foi pocivel conectar");

if ($mysqli -> connect_errno)
    echo "falha ao conectar: (".$mysqli -> connect_errno.") ".$mysqli -> connect_error;


?>  