<?php

include 'conexao.php';

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: tela_login.php"); exit;
  }

  $usuario = mysql_real_escape_string($_POST['usuario']);
  $senha = mysql_real_escape_string($_POST['senha']);

  // Validação do usuário/senha digitados
  $sql = "SELECT `id`, `nome` FROM `usuarios` WHERE (`login` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
  $query = mysqli_query($sql);
  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);
  }









  ?>




