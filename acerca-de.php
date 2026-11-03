<?php
// Configuración de título dinámico (SSR básico - Requisito C.1 del TP4)
$titulo_pagina = "Acerca de - CÓMIC HUB";

// Inclusión de la cabecera dinámica (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenido Principal -->
<main class="container my-4 flex-grow-1">
    
    <!-- Migas de pan -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small text-muted">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Acerca de</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm p-4 p-md-5 bg-white mb-4">
        <!-- Sección: Sobre CÓMIC HUB -->
        <section class="mb-5">
            <h2 class="h3 fw-bold text-dark border-bottom pb-2 mb-3">Sobre CÓMIC HUB</h2>
            
            <h3 class="h5 fw-bold text-muted mb-2">Descripción del Proyecto y Objetivos del Portal</h3>
            <p class="text-dark">
                CÓMIC HUB es una plataforma web orientada a la comunidad de lectores y fanáticos del cómic (especialmente de Marvel y DC Comics). El objetivo principal del portal es centralizar la información editorial, organizar cronologías complejas de lectura y permitir a los usuarios realizar un seguimiento detallado de su colección y listas de lectura.
            </p>

            <h3 class="h5 fw-bold text-muted mb-2 mt-4">Buscamos:</h3>
            <ul class="text-dark">
                <li class="mb-2"><strong>Facilitar el orden de lectura:</strong> Proporcionar guías estructuradas sin spoilers para abordar arcos argumentales y eventos masivos sin perderse.</li>
                <li class="mb-2"><strong>Catalogación completa:</strong> Ofrecer una base de datos detallada con metadatos de cómics, universos, personajes, dibujantes y fechas de publicación.</li>
                <li class="mb-2"><strong>Espacio comunitario:</strong> Permitir a los usuarios compartir opiniones, clasificar publicaciones y gestionar su biblioteca personal.</li>
            </ul>
        </section>

        <!-- Sección: Formulario de Contacto -->
        <section class="bg-light p-4 rounded border mb-5">
            <p class="text-muted small mb-3">
                Para fomentar la interacción con la comunidad o enviar sugerencias o correcciones de metadatos, puedes escribirnos usando el siguiente formulario de contacto estructurado:
            </p>

            <form action="#" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombreCompleto" class="form-label fw-bold small text-muted">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombreCompleto" placeholder="Ej: Marco Farfán" required>
                    </div>
                    <div class="col-md-6">
                        <label for="correoElectronico" class="form-label fw-bold small text-muted">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correoElectronico" placeholder="nombre@ejemplo.com" required>
                    </div>
                    <div class="col-12">
                        <label for="asuntoContacto" class="form-label fw-bold small text-muted">Asunto</label>
                        <select class="form-select" id="asuntoContacto" required>
                            <option value="" selected disabled>Seleccionar asunto...</option>
                            <option value="sugerencia">Sugerencia de cómic / arco argumental</option>
                            <option value="reporte">Reporte de error en metadatos</option>
                            <option value="consulta">Consulta sobre la plataforma</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="mensajeConsulta" class="form-label fw-bold small text-muted">Mensaje / Consulta</label>
                        <textarea class="form-control" id="mensajeConsulta" rows="4" placeholder="Escribe aquí tu consulta o sugerencia detallada..." required></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Enviar</button>
                    </div>
                </div>
            </form>
        </section>

        <!-- Créditos del Proyecto -->
        <section class="border-top pt-4">
            <p class="small text-muted mb-1"><strong>Proyecto:</strong> Trabajo Práctico N° 4 — PHP & Modularización SSI</p>
            <p class="small text-muted mb-1"><strong>Módulo:</strong> Programación Web</p>
            <p class="small text-muted mb-1"><strong>Desarrollador y Diseñador:</strong> Farfan Arias Marco Antonio</p>
            <p class="small text-muted mb-0"><strong>Institución:</strong> Escuela Normal Superior General Manuel Belgrano (Salta, Argentina)</p>
        </section>
    </div>

</main>

<?php 
// Inclusión del pie de página dinámico (SSI - Requisito B.3 del TP4)
require_once __DIR__ . '/includes/footer.php'; 
?>