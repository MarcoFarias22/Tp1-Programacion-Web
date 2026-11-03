<?php
// Configuración de título dinámico (SSR básico - Requisito C.1 del TP4)
$titulo_pagina = "Catálogo de Cómics - CÓMIC HUB";

// Inclusión de la cabecera dinámica (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenido Principal -->
<main class="container my-4 flex-grow-1">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h4 fw-bold text-dark">Catálogo de Cómics</h2>
            <p class="text-muted">Explora sagas, series y tomos destacados del universo Marvel y DC.</p>
        </div>
    </div>

    <!-- Cuadrícula de Tarjetas -->
    <div class="row g-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                    <span>[ Portada Cómic 1 ]</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Amazing Spider-Man</h3>
                    <p class="card-text text-muted small">Una de las sagas más icónicas del trepamuros con aventuras clásicas.</p>
                    <a href="detalle.php" class="btn btn-primary mt-auto">Ver detalles</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                    <span>[ Portada Cómic 2 ]</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Batman: The Dark Knight</h3>
                    <p class="card-text text-muted small">Sumérgete en las oscuras calles de Ciudad Gótica junto al caballero de la noche.</p>
                    <a href="detalle.php" class="btn btn-primary mt-auto">Ver detalles</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                    <span>[ Portada Cómic 3 ]</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Avengers: Infinity Gauntlet</h3>
                    <p class="card-text text-muted small">El evento cósmico definitivo donde el destino del universo entero está en juego.</p>
                    <a href="detalle.php" class="btn btn-primary mt-auto">Ver detalles</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
// Inclusión del pie de página dinámico (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/footer.php'; 
?>