
<?php
include_once ('login.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/estilo/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <form method="post">

        <div id = "container_principal">
                <div id ="Logo_container">
                    <img src="../assets/estilo/logo.png" alt="Logo" id="Logo">
                </div>

            <div id = "login_caixa">
                <div id = "erro">
                    <?php 
                        if (isset($erro)) {
                            if (!empty($erro)) {
                                echo $erro;
                            }
                        }
                    ?>
                </div>
                <h2>Login</h2>

                <div class = "campo">
                        <label for="user_email">email</label>
                        <input type="email" name = "user_email" id = "user_email" placeholder = "Email">
                </div>

                <div class = "campo">
                        <label for="user_password">senha:</label>
                        <input type="password" name = "user_password" id = "user_password" placeholder = "Senha">
                </div>

                <p id = "cadastro_link">
                    Não tem uma conta? Crie uma aqui!
                </p>

                <button type ="submit" id ="login_botao">LOGIN</button>
            </div>
    </form>
            
            <div id = "divisao">
                <h1 id="texto_divisao1">
                    <strong>Olá denovo! Seja bem vindo</strong> 
                    ao seu gerenciador de plantas
                    favorito!
                    faça login para acessar sua conta...
                </h1>
                <p id="texto_divisao2">
                    Faça o login para acessar sua conta...
                </p>

                <img src="../assets/estilo/planta.png" alt="Ilustração" id="plant">
            </div>
        </div>

</body>
</html>