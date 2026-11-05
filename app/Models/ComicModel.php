<?php
// app/Models/ComicModel.php
require_once __DIR__ . '/../../config/conexion.php';

class ComicModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $sql = "SELECT c.id_comic, c.titulo, c.sinopsis, c.anio_publicacion, e.nombre AS editorial 
                FROM comics c 
                INNER JOIN editoriales e ON c.id_editorial = e.id_editorial 
                ORDER BY c.id_comic DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT c.id_comic, c.titulo, c.sinopsis, c.anio_publicacion, e.nombre AS editorial 
                FROM comics c 
                INNER JOIN editoriales e ON c.id_editorial = e.id_editorial 
                WHERE c.id_comic = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}