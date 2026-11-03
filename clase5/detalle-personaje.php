<?php
// Configuración de título dinámico (SSR básico - Requisito C.1 del TP4)
$titulo_pagina = "Detalle del Personaje - CÓMIC HUB";

// Inclusión de la cabecera dinámica (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenido Principal -->
<main class="container my-5 flex-grow-1">
    <!-- Botón Volver -->
    <div class="mb-3">
        <a href="personajes.php" class="btn btn-outline-secondary btn-sm">&larr; Volver a Personajes</a>
    </div>

    <!-- Ficha Principal del Personaje -->
    <div class="card shadow-sm border-0 p-4 bg-white mb-4">
        <div class="row g-4 align-items-center">
            <!-- Retrato del Personaje -->
            <div class="col-md-4">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height: 350px;">
                    <span>[ Retrato del Personaje ]</span>
                </div>
            </div>
            
            <!-- Información General -->
            <div class="col-md-8">
                <span class="badge bg-primary mb-2">Universo Marvel / DC</span>
                <h2 class="fw-bold mb-3">Nombre del Personaje</h2>
                <p class="text-muted mb-4">
                    Aquí puedes encontrar la biografía detallada del personaje, sus orígenes, el universo al que pertenece, descripción de sus habilidades principales, rasgos característicos y los cómics destacados donde hace su aparición.
                </p>
                
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><strong>Identidad Secreta:</strong> Nombre Real / Alias</li>
                    <li class="mb-2"><strong>Universo / Editorial:</strong> Marvel / DC Comics</li>
                    <li class="mb-2"><strong>Base de Operaciones:</strong> Localización Principal</li>
                </ul>

                <a href="index.php" class="btn btn-dark">Ver Cómics Relacionados</a>
            </div>
        </div>
    </div>
</main>

<?php 
// Inclusión del pie de página dinámico (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/footer.php'; 
?>