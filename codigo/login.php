<?php
include_once('conection.php');

$erro = '';

if (isset($_POST['user_email'], $_POST['user_password'])) {

    $email = trim($_POST['user_email']);
    $senha = trim($_POST['user_password']);

    if (empty($email) && empty($senha)) {
        $erro = "Preencha seus dados antes de logar!";
    } elseif (empty($senha)) {
        $erro = "Preencha sua senha!";
    } elseif (empty($email)) {
        $erro = "Preencha seu email!";
    } else {
        $sql = "SELECT * FROM usuarios WHERE user_email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senha, $user['user_password'])) {
                session_start();
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['user_name'] = $user['user_name'];

                header("Location: ../index.php");
                exit;
            } else {
                $erro = "Email ou senha incorretos!";
            }
        } else {
            $erro = "Email ou senha incorretos!";
        }
    }
}
?>
