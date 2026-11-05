<?php
// api/buscar_comics.php
header('Content-Type: application/json; charset=utf-8');

// Incluir la conexión PDO desde la carpeta config
require_once __DIR__ . '/../config/conexion.php';

// Sanitizar el término de búsqueda enviado vía GET
$busqueda = isset($_GET['q']) ? trim($_GET['q']) : '';

try {
    // Si en conexion.php la variable de PDO se llama $conexion, la asignamos a $pdo
    if (!isset($pdo) && isset($conexion)) {
        $pdo = $conexion;
    }

    if (!empty($busqueda)) {
        // Consulta preparada PDO con marcadores posicionales (?) anti-SQL Injection
        $stmt = $pdo->prepare("
            SELECT c.id_comic, c.titulo, c.sinopsis, c.anio_publicacion, e.nombre AS editorial 
            FROM comics c
            INNER JOIN editoriales e ON c.id_editorial = e.id_editorial
            WHERE c.titulo LIKE ? OR e.nombre LIKE ? OR c.sinopsis LIKE ?
            ORDER BY c.id_comic DESC
        ");
        
        $parametro = "%{$busqueda}%";
        // Pasamos el parámetro 3 veces exactamente como lo requiere la consulta
        $stmt->execute([$parametro, $parametro, $parametro]);
    } else {
        // Si no hay término, traer los últimos 10 cómics
        $stmt = $pdo->query("
            SELECT c.id_comic, c.titulo, c.sinopsis, c.anio_publicacion, e.nombre AS editorial 
            FROM comics c
            INNER JOIN editoriales e ON c.id_editorial = e.id_editorial
            ORDER BY c.id_comic DESC 
            LIMIT 10
        ");
    }

    $comics = $stmt->fetchAll(PDO::FETCH_ASSOC);

    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'data'   => $comics
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Error BD: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Error Servidor: ' . $e->getMessage()
    ]);
}
?>