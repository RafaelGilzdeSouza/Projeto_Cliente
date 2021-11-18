<?php

if(!isset($_SESSION)){
    session_start();
}

// o usuario tem permissao para acessar a pagina? (nao)
if(!isset($_SESSION['cod_interno'])) { 
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}
?>