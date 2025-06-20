<?php

require_once('conection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conexao->prepare("DELETE FROM plantas WHERE id_plant = ?");
        $stmt->execute([$id]);
    }
}
header("Location: cadastro_planta_form.php");
exit;