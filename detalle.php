<?php
// Configuración de título dinámico (SSR básico - Requisito C.1 del TP4)
$titulo_pagina = "Detalle del Cómic - CÓMIC HUB";

// Inclusión de la cabecera dinámica (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenido Principal -->
<main class="container my-4 flex-grow-1">
    <!-- Botón Volver -->
    <div class="mb-3">
        <a href="index.php" class="btn btn-outline-secondary btn-sm">&larr; Volver al Catálogo</a>
    </div>

    <!-- Tarjeta de Ficha Técnica del Cómic -->
    <div class="card shadow-sm border-0 p-4 bg-white">
        <div class="row g-4 align-items-center">
            <!-- Portada -->
            <div class="col-md-4">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height: 350px;">
                    <span>[ Portada del Cómic ]</span>
                </div>
            </div>
            
            <!-- Información del Cómic -->
            <div class="col-md-8">
                <span class="badge bg-primary mb-2">Destacado</span>
                <h2 class="fw-bold mb-3">Título del Cómic</h2>
                <p class="text-muted mb-4">
                    Aquí puedes encontrar la sinopsis detallada de la obra, el universo al que pertenece, detalles de los autores, arcos argumentales y datos clave para los lectores que desean sumergirse en la historia.
                </p>
                
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><strong>Guion:</strong> Autor Principal</li>
                    <li class="mb-2"><strong>Ilustración:</strong> Artista / Dibujante</li>
                    <li class="mb-2"><strong>Editorial / Sello:</strong> Editorial de Cómics</li>
                </ul>

                <a href="#" class="btn btn-dark">Leer Ahora</a>
            </div>
        </div>
    </div>
</main>

<?php 
// Inclusión del pie de página dinámico (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/footer.php'; 
?>