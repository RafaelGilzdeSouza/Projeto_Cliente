<?php

$host = "localhost";
$user = "root";
$senha = "root";
$db = "db_eletronicsstore";

$mysqli = new mysqli($host, $user, $senha, $db);

if ($mysqli -> connect_errno)
    echo "falha ao conectar: (".$mysqli -> connect_errno.") ".$mysqli -> connect_error;


?>  