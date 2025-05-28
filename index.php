<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_user'])){
        header('Location: codigo/login_form.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>
<body>
    <h1>BEM VINDO GUERREIRO</h1>
    <a href="codigo/logout.php">sair</a>
</body>
</html>