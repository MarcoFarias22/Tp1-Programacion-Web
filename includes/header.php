<?php
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Cabecera / Navegación -->
    <header class="bg-white border-bottom shadow-sm py-3 mb-4">
        <div class="container">
            <div class="row align-items-center mb-3">
                <div class="col-md-4">
                    <h1 class="h4 text-primary m-0 fw-bold">CÓMIC HUB 🔍</h1>
                </div>
                <div class="col-md-8">
                    <!-- Formulario de Búsqueda -->
                    <form action="busqueda-avanzada.php" method="GET" class="d-flex gap-2">
                        <input type="text" name="q" class="form-control" placeholder="Buscar sagas, series..." aria-label="Buscar sagas">
                        <button type="submit" class="btn btn-primary">🔍</button>
                        <a href="busqueda-avanzada.php" class="btn btn-outline-secondary text-nowrap">Avanzada</a>
                    </form>
                </div>
            </div>
            
            <!-- Inclusión Dinámica del Menú Nav -->
            <?php require_once __DIR__ . '/nav.php'; ?>
        </div>
    </header>