<?php
include_once('conection.php');

$erro = '';

if (isset($_POST['user_email'], $_POST['user_password'])) {

    $email = $_POST['user_email'];
    $senha = $_POST['user_password'];

    if (empty($email) && empty($senha)) {
        $erro = "Preencha seus dados antes de logar!";
    } elseif (empty($senha)) {
        $erro = "Preencha sua senha!";
    } elseif (empty($email)){
        $erro = "Preencha seu email";
    }else {
        $sql = "SELECT * FROM usuarios WHERE user_email = '$email' AND user_password = '$senha'";
        $stmt = $conexao->query($sql);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['user_name'] = $user['user_name'];

            header("Location: ../index.php");
            exit;
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    }
}
?>
