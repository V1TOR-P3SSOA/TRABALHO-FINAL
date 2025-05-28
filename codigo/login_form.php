<?php
    include('conection.php');
    include_once('login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PlantCare</title>
    <link rel="stylesheet" href="../assets/estilo/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo">
        <img src="../assets/estilo/logo.png" alt="Logo PlantCare">
    </div>

    </div>

    <div id="container_principal">


        <form action="" method="POST">

            <div id="login_caixa">

                <div id="erro">
            
                <?php if (isset($erro)){
                    if(!empty($erro)){
                        echo $erro;
                    }
                }
                ?>
                </div>
                
                    <h1 id="title">Login</h1>
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

            </div>
            
        </form>

        <img src="../assets/planta.png" alt="" id="plant">

        <div id="text_caixa">
            <div id="conteudo">
                 <p>
                    <strong>Olá de novo! seja bem-vindo</strong> <br> ao seu gerenciador de plantas favorito! <br> <p class="decoration">faça login para acessar sua conta...</p>
                </p>
            </div>
           
        </div>
    </div>
</body>
</html>
