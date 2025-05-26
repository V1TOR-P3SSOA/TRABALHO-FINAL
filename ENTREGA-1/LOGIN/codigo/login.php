<?php
include_once('../conexao/conection.php');

$erro = "";

if (isset($_POST['user_name'], $_POST['user_email'], $_POST['user_password'])) {

    $nome = $_POST['user_name'];
    $email = $_POST['user_email'];
    $senha = $_POST['user_password'];

    if (empty($nome)) {
        $erro = "Preencha seu nome de usuário";
    } elseif (empty($email)) {
        $erro = "Preencha seu email";
    } elseif (empty($senha)) {
        $erro = "Preencha sua senha";
    } else {

        $sql = "SELECT * FROM usuarios WHERE user_name = :nome AND user_email = :email AND user_password = :senha";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);

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
            $erro = "Falha ao logar! Usuário ou senha incorretos.";
        }
    }
}
?>
