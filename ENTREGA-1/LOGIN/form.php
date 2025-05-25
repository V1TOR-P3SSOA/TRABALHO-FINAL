<?php
    include('conexao/conection.php');
    include('login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login PlantCare</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <label for="user_name">Nome de usuário:</label>
        <input type="text" name="user_name" id="user_name">

        <br>
        <br>
        
        <label for="user_email">Email:</label>
        <input type="text" name="user_email" id="user_email">

        <br>
        <br>

        <label for="user_password">Senha:</label>
        <input type="password" name="user_password" id="user_password">

        <br>
        <br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>