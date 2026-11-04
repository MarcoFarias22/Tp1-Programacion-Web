<?php
// admin/index.php
require_once '../config/conexion.php';

// Consulta segura con JOIN a Editoriales
$sql = "SELECT c.id_comic, c.titulo, c.sinopsis, c.anio_publicacion, e.nombre AS editorial 
        FROM comics c 
        INNER JOIN editoriales e ON c.id_editorial = e.id_editorial 
        ORDER BY c.id_comic DESC";

$stmt = $pdo->query($sql);
$registros = $stmt->fetchAll();

$titulo_pagina = "Gestión de Cómics - CÓMIC HUB";
require_once '../includes/header.php';
?>

<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold text-dark">Administración del Catálogo de Cómics</h2>
        <a href="crear.php" class="btn btn-primary fw-bold">+ Agregar Nuevo Cómic</a>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] === 'created'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ¡Cómic registrado exitosamente en MySQL!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET['status'] === 'updated'): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                ¡Registro actualizado correctamente!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET['status'] === 'deleted'): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ¡Cómic eliminado correctamente!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Editorial</th>
                    <th>Año</th>
                    <th>Sinopsis</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($registros) > 0): ?>
                    <?php foreach ($registros as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['id_comic']) ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($item['titulo']) ?></td>
                        <td><span class="badge bg-secondary"><?= htmlspecialchars($item['editorial']) ?></span></td>
                        <td><?= htmlspecialchars($item['anio_publicacion']) ?></td>
                        <td><?= htmlspecialchars(mb_strimwidth($item['sinopsis'], 0, 50, "...")) ?></td>
                        <td class="text-center text-nowrap">
                            <a href="editar.php?id=<?= $item['id_comic'] ?>" class="btn btn-sm btn-warning me-1">Editar</a>
                            <a href="eliminar.php?id=<?= $item['id_comic'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Confirma eliminar este registro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No hay cómics registrados en la base de datos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>