<?php
// index.php (Front Controller - TP10 MVC Nativo)

// Requerir el controlador principal de la arquitectura MVC
require_once __DIR__ . '/app/Controllers/ComicController.php';

// Capturar la acción y el parámetro ID por URL (GET)
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Instanciar el controlador
$controller = new ComicController();

// Enrutamiento dinámico según la acción requerida
if ($action === 'ver' && $id) {
    $controller->ver($id);
} else {
    $controller->index();
}