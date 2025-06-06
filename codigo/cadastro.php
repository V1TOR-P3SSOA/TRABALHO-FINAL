<?php
    include_once('conection.php');

    $user = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $grad= trim($_POST['user_graduation']);
    $password = trim($_POST['user_password']);

    if(!empty($_POST['user_graduation'])){
        $type = 1;
    } else {
        $type = 2;
    }

    if(!empty($_POST['user_name'])){

        $crip_password = password_hash($password, PASSWORD_DEFAULT);

        try{
            $stmt = $conexao->prepare("INSERT INTO usuarios (user_name, user_email, user_graduation, user_password, user_type) VALUES (:user, :email, :grad, :password, :type)");

            $stmt->bindValue(':user', $user);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':grad', $grad);
            $stmt->bindValue(':password', $crip_password);
            $stmt->bindValue(':type', $type);

            if($stmt->execute()){
                if($stmt->rowCount() > 0) {
                    echo "dados cadastrados com sucesso!";
                    $user = $email = $password = $grad = $type = null;
                } else {
                    echo "erro ao efetuar o cadastro";
                }
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
?>