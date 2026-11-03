<?php
$titulo_pagina = "Personajes - CÓMIC HUB";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenido Principal: Listado de Personajes -->
<main class="container my-5 flex-grow-1">
    <div class="mb-4">
        <h2 class="fw-bold">Personajes</h2>
        <p class="text-muted">Explora héroes y villanos de Marvel y DC. Encuentra tus personajes favoritos por nombre o universo.</p>
    </div>

    <!-- Barra de Búsqueda y Filtros -->
    <div class="card p-3 mb-4 shadow-sm border-0">
        <div class="row g-3 align-items-center">
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Escribe un nombre: Batman, Spider-Man...">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected>Universo: Todos</option>
                    <option value="marvel">Marvel</option>
                    <option value="dc">DC</option>
                </select>
            </div>
            <div class="col-md-1">
                <button class="btn btn-dark w-100">Buscar</button>
            </div>
        </div>
    </div>

    <!-- Grid de Personajes -->
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Personaje 1 -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span>Retrato</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Spider-Man</h3>
                    <p class="card-text small text-muted mb-3"><span class="badge bg-danger">Marvel</span> Héroe</p>
                    <a href="detalle-personaje.php" class="btn btn-outline-dark btn-sm mt-auto">Ver Perfil</a>
                </div>
            </div>
        </div>
        <!-- Personaje 2 -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span>Retrato</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Iron Man</h3>
                    <p class="card-text small text-muted mb-3"><span class="badge bg-danger">Marvel</span> Héroe</p>
                    <a href="detalle-personaje.php" class="btn btn-outline-dark btn-sm mt-auto">Ver Perfil</a>
                </div>
            </div>
        </div>
        <!-- Personaje 3 -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span>Retrato</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Batman</h3>
                    <p class="card-text small text-muted mb-3"><span class="badge bg-primary">DC</span> Héroe</p>
                    <a href="detalle-personaje.php" class="btn btn-outline-dark btn-sm mt-auto">Ver Perfil</a>
                </div>
            </div>
        </div>
        <!-- Personaje 4 -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span>Retrato</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 fw-bold">Wonder Woman</h3>
                    <p class="card-text small text-muted mb-3"><span class="badge bg-primary">DC</span> Heroína</p>
                    <a href="detalle-personaje.php" class="btn btn-outline-dark btn-sm mt-auto">Ver Perfil</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>