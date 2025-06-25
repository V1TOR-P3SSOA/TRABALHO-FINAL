<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_user'])){
        header('Location: login_form.php');
    }

    $aviso = '';
    if (isset($_SESSION['aviso'])) {

        $aviso = $_SESSION['aviso'];

        unset($_SESSION['aviso']);
        
    }
?>

<?php

    $erro = '';
    if (isset($_SESSION['erro'])) {

        $erro = $_SESSION['erro'];

        unset($_SESSION['erro']);
        
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
            <h2>Plantcare</h2>
        </div>

        <div class="nav">
            <a href="../index.php">Painel</a>
            <a href="cadastro_planta_form.php">Registro de nova planta</a>
            <a href="tarefas_form.php">Tarefas</a>
        </div>
            
    </div>

    <div id="conteudo_principal">
        <div id="cadastro_task_container">
            <form method="post" action="create_task.php">
                <div id="header_cadastro_task">
                        
                        <div id="cadastro_header">

                            <div id="titulo">
                                <div>.</div>
                                <h2>Registro de nova tarefa</h2>
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
                </div>
                <div id="dados">
                        <div class="campo">
                            <label for="planta_selecionada">ID da planta:</label>
                            <input type="number" id="planta_selecionada" name="planta_selecionada">
                        </div>

                        <div class="campo">
                            <label for="descricao_task">Descrição da tarefa: </label>
                            <input type="text" id="descricao_task" name="descricao_task">
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

        <?php
            require_once('conection.php');
            $stmt = $conexao->query("SELECT t.id_task, t.plant_id, t.prioridade, t.data_criacao, t.status, p.popular_name  FROM tarefas AS t INNER JOIN plantas AS p ON t.plant_id = p.id_plant");
            $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div id="registros">
            <div class="bg">
                <h2>Registro de tarefas</h2>
                <div class="tabela">
                    <table border="1" cellpadding="5" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID da tarefa</th>
                                <th>ID planta</th>
                                <th>Nome popular</th>
                                <th>Prioridade</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($tarefas as $tarefas): ?>
                                <tr>
                                    <td><?= htmlspecialchars($tarefas['id_task']) ?></td>
                                    <td><?= htmlspecialchars($tarefas['plant_id']) ?></td>
                                    <td><?= htmlspecialchars($tarefas['popular_name']) ?></td>
                                    <td><?= htmlspecialchars($tarefas['prioridade']) ?></td>
                                    <td><?= htmlspecialchars($tarefas['data_criacao']) ?></td>
                                    <td><?= htmlspecialchars($tarefas['status']) ?></td>
                                    <td class="acoes">
                                        <a href="edit_task.php?id=<?= $tarefas['id_task'] ?>"><button  class="button_editar">Editar</button></a>
                                        <button class="button_excluir" onclick="confirmExclusion(<?= $tarefas['id_task'] ?>)">Excluir</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>         
                </div>
            </div>
                
        </div>

        <script>
            function confirmExclusion(id_task) {
                if (confirm('Você realmente quer excluir essa tarefa? (essa ação não é reversível)')) {
                window.location.href = 'delete_task.php?id=' + id_task;
                }
            }
        </script>

    </div>
</body>
</html>