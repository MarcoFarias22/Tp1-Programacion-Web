<?php
// admin/editar.php
require_once '../config/conexion.php';

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM comics WHERE id_comic = :id");
$stmt->execute([':id' => $id]);
$comic = $stmt->fetch();

if (!$comic) {
    header('Location: index.php');
    exit;
}

$editoriales = $pdo->query("SELECT * FROM editoriales ORDER BY nombre ASC")->fetchAll();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo       = trim($_POST['titulo'] ?? '');
    $sinopsis     = trim($_POST['sinopsis'] ?? '');
    $anio         = (int)($_POST['anio_publicacion'] ?? 0);
    $id_editorial = (int)($_POST['id_editorial'] ?? 0);

    if (empty($titulo)) {
        $errores[] = "El título es obligatorio.";
    }

    if (empty($errores)) {
        $sql = "UPDATE comics 
                SET titulo = :titulo, sinopsis = :sinopsis, anio_publicacion = :anio, id_editorial = :id_editorial 
                WHERE id_comic = :id";
        
        $stmtUpd = $pdo->prepare($sql);
        $stmtUpd->execute([
            ':titulo'       => $titulo,
            ':sinopsis'     => $sinopsis,
            ':anio'         => $anio,
            ':id_editorial' => $id_editorial,
            ':id'           => $id
        ]);

        header('Location: index.php?status=updated');
        exit;
    }
} else {
    $titulo       = $comic['titulo'];
    $sinopsis     = $comic['sinopsis'];
    $anio         = $comic['anio_publicacion'];
    $id_editorial = $comic['id_editorial'];
}

$titulo_pagina = "Editar Cómic - CÓMIC HUB";
require_once '../includes/header.php';
?>

<main class="container py-4 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="h4 fw-bold mb-3">Editar Cómic (ID: <?= htmlspecialchars($id) ?>)</h2>

                <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errores as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="editar.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-bold">Título del Cómic *</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="id_editorial" class="form-label fw-bold">Editorial *</label>
                            <select class="form-select" id="id_editorial" name="id_editorial" required>
                                <?php foreach ($editoriales as $ed): ?>
                                    <option value="<?= $ed['id_editorial'] ?>" <?= $id_editorial == $ed['id_editorial'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($ed['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="anio_publicacion" class="form-label fw-bold">Año de Publicación</label>
                            <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="<?= htmlspecialchars($anio) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sinopsis" class="form-label fw-bold">Sinopsis</label>
                        <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4"><?= htmlspecialchars($sinopsis) ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning fw-bold">Actualizar Cómic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>