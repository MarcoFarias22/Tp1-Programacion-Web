<?php
// admin/crear.php
require_once '../config/conexion.php';

// Obtener editoriales disponibles
$stmtEd = $pdo->query("SELECT * FROM editoriales ORDER BY nombre ASC");
$editoriales = $stmtEd->fetchAll();

$errores = [];
$titulo = $sinopsis = $anio = '';
$id_editorial = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo        = trim($_POST['titulo'] ?? '');
    $sinopsis      = trim($_POST['sinopsis'] ?? '');
    $anio          = (int)($_POST['anio_publicacion'] ?? 0);
    $id_editorial  = (int)($_POST['id_editorial'] ?? 0);
    $id_usuario    = 1; // Asignado al usuario Admin del TP6

    if (empty($titulo)) {
        $errores[] = "El título es obligatorio.";
    }
    if ($id_editorial <= 0) {
        $errores[] = "Debe seleccionar una editorial.";
    }

    if (empty($errores)) {
        // Consulta Preparada (Anti SQL Injection)
        $sql = "INSERT INTO comics (titulo, sinopsis, anio_publicacion, id_editorial, id_usuario) 
                VALUES (:titulo, :sinopsis, :anio, :id_editorial, :id_usuario)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo'       => $titulo,
            ':sinopsis'     => $sinopsis,
            ':anio'         => $anio,
            ':id_editorial' => $id_editorial,
            ':id_usuario'   => $id_usuario
        ]);

        header('Location: index.php?status=created');
        exit;
    }
}

$titulo_pagina = "Agregar Cómic - CÓMIC HUB";
require_once '../includes/header.php';
?>

<main class="container py-4 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="h4 fw-bold mb-3">Agregar Nuevo Cómic</h2>

                <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errores as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="crear.php" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-bold">Título del Cómic *</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="id_editorial" class="form-label fw-bold">Editorial *</label>
                            <select class="form-select" id="id_editorial" name="id_editorial" required>
                                <option value="" disabled selected>Seleccione editorial...</option>
                                <?php foreach ($editoriales as $ed): ?>
                                    <option value="<?= $ed['id_editorial'] ?>" <?= $id_editorial == $ed['id_editorial'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($ed['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="anio_publicacion" class="form-label fw-bold">Año de Publicación</label>
                            <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="<?= htmlspecialchars($anio) ?>" placeholder="Ej: 1987">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sinopsis" class="form-label fw-bold">Sinopsis</label>
                        <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4"><?= htmlspecialchars($sinopsis) ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary fw-bold">Guardar Cómic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>