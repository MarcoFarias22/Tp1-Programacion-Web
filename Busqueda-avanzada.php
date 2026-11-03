<?php
$titulo_pagina = "Búsqueda Avanzada - CÓMIC HUB";
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/functions.php';

// Captura y sanitización estricta de parámetros GET
$query      = sanitizar_texto($_GET['q'] ?? '');
$editorial  = sanitizar_texto($_GET['editorial'] ?? 'todas');
$anio_desde = sanitizar_texto($_GET['anio_desde'] ?? '');
$busqueda_realizada = isset($_GET['buscar']);
?>

<main class="container my-4 flex-grow-1">
    <h2 class="h3 fw-bold text-dark border-bottom pb-2 mb-3">Búsqueda Avanzada (Envío GET)</h2>

    <!-- Formulario GET -->
    <form action="busqueda-avanzada.php" method="GET" class="bg-white p-4 rounded shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="q" class="form-label fw-bold small text-muted">Palabra clave / Título</label>
                <input type="text" class="form-control" id="q" name="q" value="<?= $query ?>" placeholder="Buscar por título o personaje...">
            </div>
            <div class="col-md-3">
                <label for="editorial" class="form-label fw-bold small text-muted">Editorial</label>
                <select class="form-select" id="editorial" name="editorial">
                    <option value="todas" <?= $editorial === 'todas' ? 'selected' : '' ?>>Todas</option>
                    <option value="marvel" <?= $editorial === 'marvel' ? 'selected' : '' ?>>Marvel Comics</option>
                    <option value="dc" <?= $editorial === 'dc' ? 'selected' : '' ?>>DC Comics</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="anio_desde" class="form-label fw-bold small text-muted">Año Desde</label>
                <input type="number" class="form-control" id="anio_desde" name="anio_desde" value="<?= $anio_desde ?>" placeholder="Ej: 1986">
            </div>
            <div class="col-12 text-end">
                <button type="submit" name="buscar" value="1" class="btn btn-primary fw-bold">🔍 Buscar (GET)</button>
            </div>
        </div>
    </form>

    <!-- Retroalimentación / Resultados sanitizados -->
    <?php if ($busqueda_realizada): ?>
        <div class="alert alert-info shadow-sm">
            <strong>Búsqueda procesada (Sanitizada contra XSS):</strong><br>
            • Término: "<?= $query ?: 'Todos los cómics' ?>"<br>
            • Editorial: <?= strtoupper($editorial) ?><br>
            <?php if (!empty($anio_desde)): ?>• Año Desde: <?= $anio_desde ?><?php endif; ?>
        </div>
    <?php endif; ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>