<?php
include('conexao.php');


/*
function consulta_query ($grupo, $fabricante)
{
    //$array = array();
    //$array = explode("-", $name);
    //$grupo = $array[0];
    //$fabricante = $array[1];

    $query = "SELECT * FROM tb_produtos WHERE grupo = '$grupo' and fabricante = '$fabricante'";
    return  <script language='javascript' type='text/javascript'>;window.location.href='home.php';</script>    ;
}
*/

$grupo = $_GET['grupo'];
$fabricante = $_GET['fabricante'];
$query = "SELECT * FROM tb_produtos WHERE grupo = '$grupo' and fabricante = '$fabricante'";
?>