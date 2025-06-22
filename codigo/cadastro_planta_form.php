<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_user'])){
        header('Location: codigo/login_form.php');
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de planta</title>
    <link rel="stylesheet" href="../assets/estilo/style_cadastro_planta.css">
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
        <div id="cadastro_planta_container">
            <form method="post" action="create_plant.php">
                <div id="header_cadastro_planta">
                        
                        <div id="cadastro_header">

                            <div id="titulo">
                                <div>.</div>
                                <h2>Registro de Planta</h2>
                            </div>
                            
                            <div id="email">
                                <p>emaildousuario@gmail.com <a href="">trocar de usuário</a></p>
                            </div>

                            <div class="texto_decoracao">
                                <p>todas as alterações ficam salvas no <u>catálogo</u></p>


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
                        
                        <div id="botao_registro">
                            <button type="submit">Registar</button>
                        </div>
                </div>
            </form>
        </div>
        <?php
            require_once('conection.php');
            $stmt = $conexao->query("SELECT id_plant, popular_name, plant_type FROM plantas");
            $plantas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div id="registros">
            <div class="bg">
                <h2>Plantas registradas</h2>
                <div class="tabela">
                    <table border="1" cellpadding="5" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome popular</th>
                                <th>Tipo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($plantas as $plantas): ?>
                                <tr>
                                    <td><?= htmlspecialchars($plantas['id_plant']) ?></td>
                                    <td><?= htmlspecialchars($plantas['popular_name']) ?></td>
                                    <td><?= htmlspecialchars($plantas['plant_type']) ?></td>
                                    <td class="acoes">
                                        <a href="edit_plant.php?id=<?= $plantas['id_plant'] ?>"><button  class="button_editar">Editar</button></a>
                                        <button  class="button_excluir" onclick="confirmExclusion(<?= $plantas['id_plant'] ?>)">Excluir</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>         
                </div>
            </div>
                
        </div>

        <script>
            function confirmExclusion(id_plant) {
                if (confirm('Você realmente quer excluir essa planta? (essa ação não é reversível)')) {
                    window.location.href = 'delete_plant.php?id=' + id_plant;
                }
            }
        </script>
    </div>  
</body>
</html>