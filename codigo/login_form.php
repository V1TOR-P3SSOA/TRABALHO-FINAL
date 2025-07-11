<?php
include_once ('login.php');
?>

<?php
    session_start();
    $aviso = '';
    if (isset($_SESSION['aviso'])) {

        $aviso = $_SESSION['aviso'];

        unset($_SESSION['aviso']);
        
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/estilo/style_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>

    <form method="post">

        <div id = "container_principal">
                <div id ="logo_container">
                    <img src="../assets/estilo/logo.png" alt="logo" id="logo">
                </div>


            <div id = "login_caixa">

                <h2 id="titulo_login">Login</h2>

                <div id = "erro">
                    <?php 
                        if (isset($erro)) {
                            if (!empty($erro)) {
                                echo $erro;
                            }
                        }
                    ?>
                </div>

                <div id="aviso">
                    <?php
                        if(isset($aviso)){
                            if (!empty($aviso)) {
                                echo $aviso;
                            }
                        }
                    ?>
                </div>

                <div class = "campo">
                        <label for="user_email">Email</label>
                        <input type="email" name = "user_email" id = "user_email" placeholder = "Ex.: user@gmail.com">
                </div>

                <div class = "campo">
                        <label for="user_password">Senha:</label>
                        <input type="password" name = "user_password" id = "user_password" placeholder = "Ex.: 12345">
                </div>

                <p id = "cadastro_link">
                    <a href="cadastro_form.php">Não tem uma conta? <u>Crie uma aqui!</u></a>
                </p>

                <button type ="submit" id ="login_botao">Login</button>
            </div>
    </form>

            <img src="../assets/estilo/planta.png" alt="" id="plant">

            <div id = "divisao">
                <div id="text">
                    <h1 id="texto_divisao1">
                        <b>Olá novamente! Seja bem vindo</b> ao seu gerenciador de plantas
                        favorito!
                    </h1>
                <p id="texto_divisao2">
                    Faça o login para acessar sua conta...
                </p>
                </div>
                
            </div>
        </div>

</body>
</html>