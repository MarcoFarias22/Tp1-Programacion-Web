<?php require_once __DIR__ . '/../../../includes/header.php'; ?>

<main class="container my-4 flex-grow-1">
    <h2 class="h3 fw-bold mb-4">Catálogo de Cómics (Arquitectura MVC Nativa)</h2>
    <div class="row g-3">
        <?php foreach ($comics as $c): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2 align-self-start"><?= htmlspecialchars($c['editorial']) ?> (<?= $c['anio_publicacion'] ?>)</span>
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($c['titulo']) ?></h5>
                        <p class="card-text text-muted small"><?= htmlspecialchars(substr($c['sinopsis'] ?? '', 0, 90)) ?>...</p>
                        <a href="index.php?action=ver&id=<?= $c['id_comic'] ?>" class="btn btn-outline-primary btn-sm mt-auto">Ver Detalle</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>