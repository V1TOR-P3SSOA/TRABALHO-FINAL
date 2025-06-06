<i?php
include_once('conection.php');
include_once('cadastro.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="../assets/estilo/style_cadastro.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <form method="post" action="cadastro.php">

        <div id="container_principal">

            <div id="logo_container">
                <img src="../assets/estilo/logo.png" alt="" id="logo">
            </div>
            
            <div id="cadastro_container">
                <h1 id="titulo_cadastro">Cadastro</h1>

                <div class="campo">
                    <label for="user_name">Nome de usuário</label>
                    <input type="text" name = "user_name" id = "user_name" placeholder = "Ex.: Vítor Pessôa">
                </div>

                <div class="campo">
                    <label for="user_email">E-mail</label>
                    <input type="email" name = "user_email" id = "user_email" placeholder = "Ex.: user@gmail.com">
                </div>

                <div class="campo">
                    <label for="user_graduation">Especialização</label>
                    <input type="text" name = "user_graduation" id = "user_graduation" list="especializacao">
                    <datalist id="especializacao">

                        <option value="Biologia">Grad 1</option>

                        <option value="Agrônomia">Grad 2</option>

                        <option value="Botânica">Grad 3</option>

                        <option value="Horticultura">Grad 4</option>

                        <option value="Téc.Agricultura">Grad 5</option>

                    </datalist>
                </div>

                <div class="campo">
                    <label for="user_password">Senha</label>
                    <input type="password" name="user_password" id="user_password" placeholder="Ex.:12345">
                </div>
                
                <p id = "login_link">
                    <a href="login_form.php">Já tem uma conta? <u>faça seu login aqui!</u></a>
                </p>

                <button type="submit" id="botao_cadastro">Cadastrar</button>

            </div>

            <div id="divisao">
                <div id="texto">
                    <h1 id="testo_divisao1">
                        <strong>Seja bem vindo!</strong> é <br> sempre um prazer <br> receber novos usuários...<br>
                    </h1>
                    <p id="texto_divisao2">insira seus dados para realizar o cadastro</p>
                </div>

                <div id="decoracao">
                    <img src="../assets/estilo/pessoas_planta" alt="">
                </div>
            </div>

        </div>
    </form>
    
</body>
</html>