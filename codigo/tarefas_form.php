<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_user'])){
        header('Location: codigo/login_form.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="../assets/estilo/tarefas_form_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div id="left_bar">

        <div id="logo">
            <img src="../assets/estilo/logo.png" alt="">
            <h1>Plantcare</h1>
        </div>

        <div class="nav">
            <a href="../index.php">Painel</a>
            <a href="cadastro_planta_form.php">Registro de nova planta</a>
            <a href="tarefas_form.php">Tarefas</a>
        </div>
            
    </div>

    <div id="conteudo_principal">
        <div id="cadastro_planta_container">
            <form method="post" action="create_plant.php">
                <div id="header_cadastro_planta">
                        
                        <div id="cadastro_header">

                            <div id="titulo">
                                <div>.</div>
                                <h2>Registro de Planta</h2>
                            </div>

                            <div class="texto_decoracao">
                                <p>todas as novas tarefas ficam salvas no <u>Registro de tarefas</u></p>


                                <div id="aviso">
                                    <?php
                                        if(isset($aviso)){

                                            if (!empty($aviso)) {

                                                echo $aviso;

                                            }
                                        }
                                    ?>
                                </div>

                                <div id="erro">
                                    <?php
                                        if(isset($erro)){

                                            if (!empty($erro)) {

                                                echo $erro;

                                            }
                                        }
                                    ?>
                                </div>
                            </div> 
                        </div>
                        <div class="campo">
                            <label for="descricao_task">Descrição da tarefa: </label>
                            <textarea id="descricao_task" name="descricao_task" rows="8" cols="50"></textarea>
                        </div>

                        <div class="campo">
                            <label for="prioridade_task">Prioridade: </label>
                            <select id="prioridade_task" name="prioridade_task">
                                <option value=""  disabled selected></option>
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="data_criacao">Tarefa criada em: </label>
                            <input type="date" id="data_criacao" name="data_criacao">
                        </div>

                        <div class="campo">
                            <label for="status_task">Status:</label>
                            <select id="status_task" name="status_task">
                                <option value=""  disabled selected></option>
                                <option value="Pendente">Pendente</option>
                                <option value="Concluindo">Concluindo</option>
                                <option value="Concluída">Concluída</option>
                            </select>
                        </div>
                        
                        <div id="botao_registro">
                            <button type="submit">Registar</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>