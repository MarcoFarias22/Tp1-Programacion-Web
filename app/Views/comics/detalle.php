<?php require_once __DIR__ . '/../../../includes/header.php'; ?>

<main class="container my-4 flex-grow-1">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small text-muted">
            <li class="breadcrumb-item"><a href="index.php?action=index" class="text-decoration-none">Catálogo</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($comic['titulo']) ?></li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm p-4 p-md-5 bg-white">
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height: 320px;">
                    <span class="fs-4">[ Portada de <?= htmlspecialchars($comic['titulo']) ?> ]</span>
                </div>
            </div>
            <div class="col-md-8 d-flex flex-column">
                <span class="badge bg-secondary mb-2 align-self-start"><?= htmlspecialchars($comic['editorial']) ?> (<?= $comic['anio_publicacion'] ?>)</span>
                <h2 class="h3 fw-bold text-dark mb-3"><?= htmlspecialchars($comic['titulo']) ?></h2>
                <h5 class="h6 fw-bold text-muted">Sinopsis:</h5>
                <p class="text-muted leading-relaxed mb-4">
                    <?= htmlspecialchars($comic['sinopsis'] ?? 'Sin sinopsis disponible.') ?>
                </p>
                
                <div class="mt-auto">
                    <a href="index.php?action=index" class="btn btn-outline-secondary">← Volver al Catálogo</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>