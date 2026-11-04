<?php
// Iniciar sesión globalmente si no se ha iniciado previamente
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($titulo_pagina)) {
    $titulo_pagina = "CÓMIC HUB - Portal de Cómics";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal de cómics CÓMIC HUB. Explora sagas, series y tomos destacados del universo Marvel y DC.">
    <title><?= $titulo_pagina; ?></title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/COMIC-HUB/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Cabecera / Navegación -->
    <header class="bg-white border-bottom shadow-sm py-3 mb-4">
        <div class="container">
            <div class="row align-items-center mb-3 g-3">
                <!-- Logo -->
                <div class="col-lg-3 col-md-4">
                    <h1 class="h4 text-primary m-0 fw-bold">
                        <a href="/COMIC-HUB/index.php" class="text-decoration-none text-primary">CÓMIC HUB 🔍</a>
                    </h1>
                </div>

                <!-- Buscador -->
                <div class="col-lg-5 col-md-4">
                    <form action="/COMIC-HUB/busqueda-avanzada.php" method="GET" class="d-flex gap-2">
                        <input type="text" name="q" class="form-control" placeholder="Buscar sagas, series..." aria-label="Buscar sagas">
                        <button type="submit" class="btn btn-primary">🔍</button>
                        <a href="/COMIC-HUB/busqueda-avanzada.php" class="btn btn-outline-secondary text-nowrap">Avanzada</a>
                    </form>
                </div>

                <!-- Estado de Sesión / Botones -->
                <div class="col-lg-4 col-md-4 text-md-end">
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <div class="d-inline-flex align-items-center gap-2">
                            <span class="badge bg-light text-dark border p-2 me-1">
                                👤 <?= htmlspecialchars($_SESSION['usuario_nombre']); ?>
                                <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'administrador')): ?>
                                    <span class="badge bg-danger ms-1">Admin</span>
                                <?php endif; ?>
                            </span>

                            <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'administrador')): ?>
                                <a href="/COMIC-HUB/admin/index.php" class="btn btn-outline-primary btn-sm fw-bold">Panel Admin</a>
                            <?php endif; ?>

                            <a href="/COMIC-HUB/logout.php" class="btn btn-danger btn-sm fw-bold">Salir</a>
                        </div>
                    <?php else: ?>
                        <div class="d-inline-flex gap-2">
                            <a href="/COMIC-HUB/login.php" class="btn btn-outline-primary btn-sm fw-bold">Iniciar Sesión</a>
                            <a href="/COMIC-HUB/registro.php" class="btn btn-primary btn-sm fw-bold">Registrarse</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Inclusión Dinámica del Menú Nav -->
            <?php require_once __DIR__ . '/nav.php'; ?>
        </div>
    </header>