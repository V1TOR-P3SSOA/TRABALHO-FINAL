<?php

require_once('conection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conexao->prepare("DELETE FROM tarefas WHERE id_task = ?");
        $stmt->execute([$id]);
    }
}
header("Location: tarefas_form.php");
exit;

?>