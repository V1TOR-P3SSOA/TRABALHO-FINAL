<?php
    require_once('conection.php');

    if (!isset($_GET['id'])) {
        header("Location: read_plant.php");
        exit;
    }

    $id = intval($_GET['id']);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = trim($_POST['nome_planta']);
        $nome_cientifico = $_POST['nome_cientifico_planta'];
        $tipo = trim($_POST['tipo_planta']);
        $ambiente = trim($_POST['ambiente_ideal']);
        $obs = trim($_POST['cuidados_gerais']);
        

        if (!empty($nome) && !empty($nome_cientifico) && !empty($tipo) && !empty($ambiente) && !empty($obs)) {
            $stmt = $conexao->prepare("UPDATE plantas SET popular_name = ?, plant_type = ?, plant_environment = ?, plant_obs	 = ?, scientific_name = ? WHERE id_plant = ?");
            $stmt->execute([$nome, $nome_cientifico, $tipo, $ambiente, $obs, $id]);
            header("Location: cadastro_planta_form.php");
            exit;
        } else {
            $error = "Preencha todos os campos!";
        }
    }

    $stmt = $conexao->prepare("SELECT * FROM plantas WHERE id_plant = ?");
    $stmt->execute([$id]);
    $planta = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$planta) {
        echo "Planta não encontrada.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar planta</title>
    <link rel="stylesheet" href="../assets/estilo/edit_plant_style.css">
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
            <a href="read_plant.php">Plantas registradas</a>
        </div>
            
    </div>

    <div id="conteudo_principal">
        <div id="edit_form">
            <div id="edit_titulo">
                <h2>Editar Planta</h2>
            </div>
            <form method="post">
                <div class="campo">
                    <label for="nome_planta">Nome popular:</label>
                    <input type="text" id="nome_planta" name="nome_planta" value="<?= htmlspecialchars($planta['popular_name']) ?>">
                </div>

                <div class="campo">
                    <label for="nome_cientifico_planta">Nome científico:</label>
                    <input type="text" id="nome_cientifico_planta" name="nome_cientifico_planta" value="<?= htmlspecialchars($planta['scientific_name']) ?>">
                </div>

                <div class="campo">
                    <label for="tipo_planta">Tipo:</label>
                    <input type="text" id="tipo_planta" name="tipo_planta" value="<?= htmlspecialchars($planta['plant_type']) ?>">
                </div>

                <div class="campo">
                    <label for="ambiente_ideal">Ambiente ideal:</label>
                    <input type="text" id="ambiente_ideal" name="ambiente_ideal" value="<?= htmlspecialchars($planta['plant_environment']) ?>">
                </div>

                <div class="campo">
                    <label for="cuidados_gerais:">Cuidados gerais e observações:</label>
                    <input type="text" id="cuidados_gerais" name="cuidados_gerais" value="<?= htmlspecialchars($planta['plant_obs']) ?>">
                </div>
                <div id="botoes_acao">
                    <div id="button_cancelar">
                        <button type="button" onclick="window.location.href='cadastro_planta_form.php'">Cancelar</button>
                    </div>
                    <div id="button_salvar">
                        <button type="submit">Salvar Alterações</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

      
</body>
</html>