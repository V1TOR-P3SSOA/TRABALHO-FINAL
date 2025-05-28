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
        $sql = "SELECT * FROM usuarios WHERE user_email = :email AND user_password = :senha";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['user_email'] = $user['user_email'];

            header("Location:../index.php");
            exit;
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    }
}
?>
