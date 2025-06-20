<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_user'])){
        header('Location: codigo/login_form.php');
    }
    require_once('conection.php');

    $stmt = $conexao->query("SELECT id_plant, popular_name FROM plantas");
    $plantas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registros</title>
    <link rel="stylesheet" href="../assets/estilo/planta_read_style.css">
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
    <div id="registros">
        <h2>Plantas registradas</h2>
        <div class="tabela">
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome popular</th>
                        <th>Tipo</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($plantas as $plantas): ?>
                        <tr>
                            <td><?= htmlspecialchars($plantas['id_plant']) ?></td>
                            <td><?= htmlspecialchars($plantas['popular_name']) ?></td>
                            <td>
                                <a class="button_editar" href="edit_plant.php?id=<?= $plantas['id_plant'] ?>">Editar</a>
                                <button  class="button_excluir" onclick="confirmExclusion(<?= $plantas['id_plant'] ?>)">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>         
        </div>
    </div>

    <script>
        function confirmExclusion(id_plant) {
            if (confirm('Você realmente quer excluir essa planta? (essa ação não é reversível)')) {
                window.location.href = 'delete_plant.php?id=' + id_plant;
            }
        }
    </script>
    
</body>
</html>