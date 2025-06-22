<?php
    require_once('conection.php');

    if (!isset($_GET['id'])) {
        header("Location: read_task.php");
        exit;
    }

    $id = intval($_GET['id']);
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $descricao_tarefa = trim($_POST['descricao_task']);
        $prioridade_tarefa = trim($_POST['prioridade_task']);
        $data_tarefa = trim($_POST['data_criacao']);
        $status_tarefa = trim($_POST['status_task']);
        $id_planta = trim($_POST['planta_selecionada']);

        if (empty($descricao_tarefa) || empty($prioridade_tarefa) || empty($data_tarefa) || empty($status_tarefa) || empty($id_planta)) {
            $erro = "Preencha todos os campos";
        }

        if(empty($erro)){
            try{
                $stmt = $conexao->prepare("UPDATE tarefas SET descricao = ?, prioridade = ?, data_criacao = ?, status = ?, plant_id = ? WHERE id_task = ?");
                $stmt->execute([$descricao_tarefa, $prioridade_tarefa, $data_tarefa, $status_tarefa, $id_planta, $id]);
                header("Location: tarefas_form.php");
                exit;
            } catch (PDOException $aviso) {
                $aviso = "Erro: " . $aviso->getMessage();
            }
        
        }
    }
    $stmt = $conexao->prepare("SELECT * FROM tarefas WHERE id_task = ?");
    $stmt->execute([$id]);
    $tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tarefa) {
        echo "Tarefa não encontrada";
        exit;
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
    <title>Editar tarefa</title>
    <link rel="stylesheet" href="../assets/estilo/edit_task_style.css">
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
        <div id="edit_form">
            <div id="edit_titulo">
                <h2>Editar tarefa</h2>
                <div>
                    <?php
                        if(isset($erro)){

                            if (!empty($erro)) {

                            echo $erro;

                            }
                        }
                    ?>
                </div>
            </div>
            <form method="post">

                <div class="campo">
                    <label for="planta_selecionada">ID da planta:</label>
                    <input type="number" id="planta_selecionada" name="planta_selecionada" value="<?= htmlspecialchars($tarefa['plant_id']) ?>">
                </div>

                <div class="campo">
                    <label for="descricao_task">Descrição da tarefa: </label>
                    <input type="text" id="descricao_task" name="descricao_task" value="<?= htmlspecialchars($tarefa['descricao']) ?>">
                </div>

                <div class="campo">
                    <label for="prioridade_task">Prioridade: </label>
                    <select id="prioridade_task" name="prioridade_task" value="<?= htmlspecialchars($tarefa['prioridade']) ?>">
                        <option value=""  disabled selected></option>
                        <option value="Baixa" <?= $tarefa['prioridade'] === 'Baixa' ? 'selected' : '' ?>>Baixa</option>
                        <option value="Média" <?= $tarefa['prioridade'] === 'Média' ? 'selected' : '' ?>>Média</option>
                        <option value="Alta" <?= $tarefa['prioridade'] === 'Alta' ? 'selected' : '' ?>>Alta</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="data_criacao">Tarefa criada em: </label>
                    <input type="date" id="data_criacao" name="data_criacao" value="<?= htmlspecialchars($tarefa['data_criacao']) ?>">
                </div>

                <div class="campo">
                    <label for="status_task">Status:</label>
                    <select id="status_task" name="status_task" value="<?= htmlspecialchars($tarefa['plant_id']) ?>">
                        <option value=""  disabled selected></option>
                        <option value="Pendente" <?= $tarefa['status'] === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                        <option value="Concluindo" <?= $tarefa['status'] === 'Concluindo' ? 'selected' : '' ?>>Concluindo</option>
                        <option value="Concluída" <?= $tarefa['status'] === 'Conclída' ? 'selected' : '' ?>>Concluída</option>
                    </select>
                </div>

                <div id="button_cancelar">
                        <button type="button" onclick="window.location.href='tarefas_form.php'">Cancelar</button>
                </div>   

                <div id="button_salvar">
                    <button type="submit">Salvar alterações</button>
                </div>

                </div>
            </form>
        </div>
    </div>

      
</body>
</html>