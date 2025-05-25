<?php
include_once('conexao/conection.php');

if (isset($_POST['user_name'], $_POST['user_email'], $_POST['user_password'])) {

    $nome = $_POST['user_name'];
    $email = $_POST['user_email'];
    $senha = $_POST['user_password'];

    if (empty($nome)) {
        echo "Preencha seu nome de usuário";
    } elseif (empty($email)) {
        echo "Preencha seu email";
    } elseif (empty($senha)) {
        echo "Preencha sua senha";
    } else {

        $sql = "SELECT * FROM usuarios WHERE user_name = :nome AND user_email = :email AND user_password = :senha";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['user_name'] = $user['user_name'];

            header("Location: homepage.php");
            exit;
        } else {
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }
    }
}
?>
