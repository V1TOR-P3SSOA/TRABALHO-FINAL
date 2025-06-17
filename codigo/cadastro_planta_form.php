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
    <title>Cadastro de planta</title>
    <link rel="stylesheet" href="../assets/estilo/index_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div id="dashboard">

        <div id="left_bar">
            <div id="logo">
                <img src="../assets/estilo/logo.png" alt="">
                <h1>Plantcare</h1>
            </div>
            

            <div class="nav">
                <a href="../index.php">Painel</a>
                <a href="cadastro_planta_form.php">Catálogo</a>
            </div>
            
        </div>

        <!-- <a href="logout.php">voltar para o login</a> -->
    </div>
    
</body>
</html>