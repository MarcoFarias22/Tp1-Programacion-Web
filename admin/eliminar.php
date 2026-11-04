<?php
// admin/eliminar.php
require_once '../config/conexion.php';

$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // Prepared Statement seguro para eliminar
    $stmt = $pdo->prepare("DELETE FROM comics WHERE id_comic = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: index.php?status=deleted');
exit;
?>