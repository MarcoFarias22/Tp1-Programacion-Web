<?php
$titulo_pagina = "Contacto y Acerca de - CÓMIC HUB";
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/functions.php';

// Variables para mensajes de retroalimentación y persistencia
$errores = [];
$exito = false;
$nombre = '';
$email = '';
$asunto = '';
$mensaje = '';

// Procesamiento de formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización estricta de entradas (OWASP XSS)
    $nombre  = sanitizar_texto($_POST['nombreCompleto'] ?? '');
    $email   = sanitizar_texto($_POST['correoElectronico'] ?? '');
    $asunto  = sanitizar_texto($_POST['asuntoContacto'] ?? '');
    $mensaje = sanitizar_texto($_POST['mensajeConsulta'] ?? '');

    // Validaciones en el servidor
    if (empty($nombre)) {
        $errores[] = "El nombre completo es obligatorio.";
    }
    if (empty($email)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!validar_email($_POST['correoElectronico'] ?? '')) {
        $errores[] = "El formato del correo electrónico ingresado no es válido.";
    }
    if (empty($asunto)) {
        $errores[] = "Debe seleccionar un asunto para su consulta.";
    }
    if (empty($mensaje)) {
        $errores[] = "El mensaje no puede estar vacío.";
    }

    // Si no hay errores, se confirma el envío y se limpia la persistencia
    if (empty($errores)) {
        $exito = true;
        $nombre = $email = $asunto = $mensaje = '';
    }
}
?>

<main class="container my-4 flex-grow-1">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small text-muted">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Acerca de</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm p-4 p-md-5 bg-white mb-4">
        <h2 class="h3 fw-bold text-dark border-bottom pb-2 mb-3">Contacto y Sugerencias (Formulario POST)</h2>

        <!-- Alertas de Retroalimentación -->
        <?php if ($exito): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Mensaje enviado con éxito!</strong> Gracias por contactarte con CÓMIC HUB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading h6 fw-bold mb-2">Por favor corrige los siguientes errores:</h5>
                <ul class="mb-0 ps-3 small">
                    <?php foreach ($errores as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulario POST con Persistencia de Campos -->
        <form action="acerca-de.php" method="POST" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nombreCompleto" class="form-label fw-bold small text-muted">Nombre Completo *</label>
                    <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" value="<?= $nombre ?>" placeholder="Ej: Marco Farfán">
                </div>
                <div class="col-md-6">
                    <label for="correoElectronico" class="form-label fw-bold small text-muted">Correo Electrónico *</label>
                    <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?= $email ?>" placeholder="nombre@ejemplo.com">
                </div>
                <div class="col-12">
                    <label for="asuntoContacto" class="form-label fw-bold small text-muted">Asunto *</label>
                    <select class="form-select" id="asuntoContacto" name="asuntoContacto">
                        <option value="" disabled <?= empty($asunto) ? 'selected' : '' ?>>Seleccionar asunto...</option>
                        <option value="sugerencia" <?= $asunto === 'sugerencia' ? 'selected' : '' ?>>Sugerencia de cómic</option>
                        <option value="reporte" <?= $asunto === 'reporte' ? 'selected' : '' ?>>Reporte de error en metadatos</option>
                        <option value="consulta" <?= $asunto === 'consulta' ? 'selected' : '' ?>>Consulta sobre la plataforma</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="mensajeConsulta" class="form-label fw-bold small text-muted">Mensaje / Consulta *</label>
                    <textarea class="form-control" id="mensajeConsulta" name="mensajeConsulta" rows="4" placeholder="Escribe aquí tu consulta..."><?= $mensaje ?></textarea>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4 fw-bold">Enviar Consulta (POST)</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>