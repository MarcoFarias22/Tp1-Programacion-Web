<?php
// app/Controllers/ComicController.php
require_once __DIR__ . '/../Models/ComicModel.php';

class ComicController {
    private $model;

    public function __construct() {
        $this->model = new ComicModel();
    }

    public function index() {
        $comics = $this->model->obtenerTodos();
        $titulo_pagina = "Catálogo MVC Nativo - CÓMIC HUB";
        require_once __DIR__ . '/../Views/comics/index.php';
    }

    public function ver($id) {
        $comic = $this->model->obtenerPorId($id);
        if (!$comic) {
            header("Location: index.php?action=index");
            exit;
        }
        $titulo_pagina = "Detalle MVC - " . htmlspecialchars($comic['titulo']);
        require_once __DIR__ . '/../Views/comics/detalle.php';
    }
}