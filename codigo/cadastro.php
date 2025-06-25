<?php
session_start();
include_once('conection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user     = isset($_POST['user_name'])       ? trim($_POST['user_name'])       : '';
    $email    = isset($_POST['user_email'])      ? trim($_POST['user_email'])      : '';
    $grad     = isset($_POST['user_graduation']) ? trim($_POST['user_graduation']) : '';
    $password = isset($_POST['user_password'])   ? trim($_POST['user_password'])   : '';
    $type = "";

    if(!empty($grad)){
        $type = 1;
    } else{
        $type = 2;
    }

    if (empty($user) || empty($email)|| empty($password)) {
        $_SESSION['aviso'] = "Preencha todos os campos obrigatórios!";
        header("Location: cadastro_form.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['aviso'] = "Insira um e-mail válido!";
        header("Location: cadastro_form.php");
        exit;
    }

    if (strlen($password) < 6) {
        $_SESSION['aviso'] = "A senha deve conter no mínimo 6 caracteres!";
        header("Location: cadastro_form.php");
        exit;
    }

    try {
        $crip = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (user_name, user_email, user_graduation, user_password, user_type)
                VALUES (:user, :email, :grad, :password, :type)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':grad', $grad);
        $stmt->bindValue(':password', $crip);
        $stmt->bindValue(':type', $type);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $_SESSION['aviso'] = "Cadastro realizado com sucesso! Faça seu login.";
            header("Location: login_form.php");
            exit;
        } else {
            $_SESSION['aviso'] = "Erro ao efetuar o cadastro.";
            header("Location: cadastro_form.php");
            exit;
        }

    } catch (PDOException $e) {
        $_SESSION['aviso'] = "Erro no servidor: " . $e->getMessage();
        header("Location: cadastro_form.php");
        exit;
    }
}
