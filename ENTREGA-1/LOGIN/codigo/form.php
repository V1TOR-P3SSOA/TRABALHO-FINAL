<?php
    include('../conexao/conection.php');
    include('login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login PlantCare</title>
    <link rel="stylesheet" href="../assets/estilo/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo">
        <img src="../assets/estilo/logo.png" alt="Logo PlantCare">
    </div>

    <div id="login">
    <form action="" method="POST">
        <h1 id="title">Login</h1>
        <div class="dados">
            <label for="user_name">Nome de usuário:</label>
            <input type="text" name="user_name" id="user_name">
        </div>
       
        <div class="dados">
            <label for="user_email">Email:</label>
            <input type="text" name="user_email" id="user_email">
        </div>
        
        <div class="dados">
            <label for="user_password">Senha:</label>
            <input type="password" name="user_password" id="user_password">
        </div>
        
        <div id="submit">
            <button type="submit">Entrar</button>
        </div>
    </form>
    </div>
    <img src="../assets/planta.png" alt="" id="plant">
    <div id="text">
        <p>
            <p class="destaque">Olá de novo! seja bem vindo</p>ao seu gerenciador <br> de plantas <br> favorito! <br> <p class="destaque2">faça login para acessar sua conta...</p>
        </p>
    </div>
</body>
</html>