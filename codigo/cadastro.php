<?php
    include_once('conection.php');

    $aviso = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = trim($_POST['user_name']);
        $email = trim($_POST['user_email']);
        $grad = trim($_POST['user_graduation']);
        $password = trim($_POST['user_password']);

        if (!empty($_POST['user_graduation'])) {
            $type = 1;
        } else {
            $type = 2;
        }

        if (!empty($_POST['user_name'])) {
            if (empty($user) || empty($email) || empty($password)) {
                $aviso = "Preencha todos os campos obrigatórios!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $aviso = "E-mail inválido!";
            } elseif (strlen($password) < 6) {
                $aviso = "A senha deve ter pelo menos 6 caracteres!";
            } else {
                $aviso = "";
            }

            if (empty($aviso)) {
                $crip_password = password_hash($password, PASSWORD_DEFAULT);

                try {
                    $stmt = $conexao->prepare("INSERT INTO usuarios (user_name, user_email, user_graduation, user_password, user_type) VALUES (:user, :email, :grad, :password, :type)");

                    $stmt->bindValue(':user', $user);
                    $stmt->bindValue(':email', $email);
                    $stmt->bindValue(':grad', $grad);
                    $stmt->bindValue(':password', $crip_password);
                    $stmt->bindValue(':type', $type);

                    if ($stmt->execute()) {
                        if ($stmt->rowCount() > 0) {
                            session_start();
                            header('Location: ../index.php');
                            $_SESSION['aviso'] = "Dados cadastrados com sucesso! Prossiga e faça seu login...";
                            exit;
                        } else {
                            $aviso = "Erro ao efetuar o cadastro.";
                        }
                    }
                } catch (PDOException $erro) {
                    $aviso = "Erro: " . $erro->getMessage();
                }
            }
        }
    }
?>
