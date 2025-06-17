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
    <link rel="stylesheet" href="../assets/estilo/style_cadastro_planta.css">
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

            <div id="cadastro_planta_container">

                <div id="header_cadastro_planta">
                    
                    <div id="cadastro_header">

                        <div id="titulo">
                            <h1>Cadastro de Planta</h1>
                        </div>
                        
                        <div id="email">
                            <p>emaildousuario@gmail.com <a href="">trocar de usuário</a></p>
                        </div>

                        <div class="texto_decoracao">
                            <p>todas as alterações ficam salvas no <u>catálogo</u></p>
                        </div>

                    </div>
                    
                    <div class="campo">
                        <label for="nome_planta">Nome popular:</label>
                        <input type="text" id="nome_planta" name="nome_planta">
                    </div>

                    <div class="campo">
                        <label for="nome_cientifico_planta">Nome científico:</label>
                        <input type="text" id="nome_cientifico_planta" name="nome_cientifico_planta">
                    </div>

                    <div class="campo">
                        <label for="tipo_planta">Tipo:</label>
                        <input type="text" id="tipo_planta" name="tipo_planta">
                    </div>

                    <div class="campo">
                        <label for="ambiente_ideal">Ambiente ideal:</label>
                        <input type="text" id="ambiente_ideal" name="ambiente_ideal">
                    </div>

                    <div class="campo">
                        <label for="Cuidados gerais e observações:">Cuidados gerais e observações:</label>
                        <input type="text" id="cuidados_gerais" name="cuidados_gerais">
                    </div>
                    
                    <div id="botao_cadastro">
                        <button type="submit" id="botao_cadastrar">Cadastrar</button>
                    </div>
                </div>

            </div>

        <!-- <a href="logout.php">voltar para o login</a> -->
    </div>
    
</body>
</html>