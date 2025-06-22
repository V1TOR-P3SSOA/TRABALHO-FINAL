<?php
    ob_start();
    session_start();
    include_once("conection.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $aviso = "";
    $erro= "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descricao_tarefa = trim($_POST['descricao_task']);
        $prioridade_tarefa = trim($_POST['prioridade_task']);
        $data_tarefa = trim($_POST['data_criacao']);
        $status_tarefa = trim($_POST['status_task']);
        $id_planta = trim($_POST['planta_selecionada']);

        if (empty($descricao_tarefa) || empty($prioridade_tarefa) || empty($data_tarefa) || empty($status_tarefa) || empty($id_planta)) {
            $_SESSION['erro'] = "Preencha todos os campos!";
            header("Location: tarefas_form.php");
            exit;
        } 
        
        if (empty($descricao_tarefa) && empty($prioridade_tarefa) && empty($data_tarefa) && empty($status_tarefa) && empty($id_planta)) {
            $_SESSION['erro'] = "Preencha todos os campos!";
            header("Location: tarefas_form.php");
            exit;
        }

        if (empty($erro)) {
            try {

                $stmt = $conexao->prepare("INSERT INTO tarefas (descricao, prioridade, data_criacao, status, plant_id) VALUES (:descricao, :prioridade, :data_criacao, :status, :plant_id)");

                $stmt->bindValue(':descricao', $descricao_tarefa);
                $stmt->bindValue(':prioridade', $prioridade_tarefa);
                $stmt->bindValue(':data_criacao', $data_tarefa);
                $stmt->bindValue(':status', $status_tarefa);
                $stmt->bindValue(':plant_id', $id_planta);

                if ($stmt->execute()) {
                    $_SESSION['aviso'] = "Tarefa registrada com sucesso! O cuidado é sempre necessário...";
                    header('Location: tarefas_form.php');
                    exit;
                } else {
                    $aviso = "Erro ao registrar a planta.";
                }

            } catch (PDOException $aviso) {
                $aviso = "Erro: " . $aviso->getMessage();
            }
        }
    }
?>
