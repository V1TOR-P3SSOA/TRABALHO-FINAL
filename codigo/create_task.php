<?php

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

        if (empty($descricao_tarefa) || empty($prioridade_tarefa) || empty($data_tarefa) || empty($status_tarefa)) {
            $erro = "Preencha todos os campos!";
        }

        if (empty($erro)) {
            try {

                $stmt = $conexao->prepare("INSERT INTO plantas (popular_name, scientific_name, plant_type, plant_environment, plant_obs) VALUES (:name, :scientific_name, :type, :environment, :obs)");

                $stmt->bindValue(':name', $nome_popular);
                $stmt->bindValue(':scientific_name', $nome_cientifico);
                $stmt->bindValue(':type', $tipo);
                $stmt->bindValue(':environment', $ambiente);
                $stmt->bindValue(':obs', $observaçoes);

                if ($stmt->execute()) {
                    $_SESSION['aviso'] = "Planta registrada com sucesso!";
                    header('Location: cadastro_planta_form.php');
                    exit;
                } else {
                    $aviso = "Erro ao registrar a planta.";
                }

            } catch (PDOException $aviso) {
                $aviso = "Erro: " . $aviso->getMessage();
            }
        }

        // Se chegou até aqui, houve erro. Armazena o aviso na sessão e redireciona de volta.
        $_SESSION['erro'] = $erro;
        header('Location: cadastro_planta_form.php');
        exit;
    }
?>
