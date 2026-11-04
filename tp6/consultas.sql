USE comic_hub_db;

-- 1. CREATE (Inserciones Iniciales)
-- Inserción en tablas maestras/secundarias
INSERT INTO roles (nombre) VALUES ('Administrador'), ('Lector');

INSERT INTO editoriales (nombre, pais) VALUES ('DC Comics', 'EE.UU.'), ('Marvel Comics', 'EE.UU.');

INSERT INTO categorias (nombre, descripcion) VALUES 
('Origen', 'Historias sobre los inicios del personaje'),
('Grandes Eventos', 'Crossovers y arcos de gran escala');

INSERT INTO usuarios (nombre, email, password, id_rol) VALUES 
('Marco Farfán', 'marco@comichub.com', '$2y$10$HASH_PASSWORD_EJEMPLO', 1),
('Juan Pérez', 'juan@example.com', '$2y$10$HASH_PASSWORD_EJEMPLO', 2);

-- Inserciones en la tabla principal vinculando claves foráneas
INSERT INTO comics (titulo, sinopsis, anio_publicacion, id_editorial, id_usuario) VALUES 
('Batman: Year One', 'El origen definitivo del Caballero Oscuro en Gotham.', 1987, 1, 1),
('Civil War #1', 'El inicio del conflicto entre Capitán América e Iron Man.', 2006, 2, 1);

-- Inserción en relación N:M
INSERT INTO comic_categoria (id_comic, id_categoria) VALUES (1, 1), (2, 2);

-- 2. READ (Consultas y Uniones)
-- Consulta SELECT con WHERE y ORDER BY
SELECT id_comic, titulo, anio_publicacion 
FROM comics 
WHERE anio_publicacion > 2000 
ORDER BY anio_publicacion DESC;

-- Consulta SELECT con INNER JOIN entre múltiples tablas
SELECT 
    c.id_comic,
    c.titulo AS comic_titulo,
    c.anio_publicacion,
    e.nombre AS editorial,
    u.nombre AS publicado_por
FROM comics c
INNER JOIN editoriales e ON c.id_editorial = e.id_editorial
INNER JOIN usuarios u ON c.id_usuario = u.id_usuario
ORDER BY c.created_at DESC;

-- 3. UPDATE (Actualización de Registros)
UPDATE comics 
SET sinopsis = 'El origen canónico y definitivo de Batman escrito por Frank Miller.' 
WHERE id_comic = 1;

-- 4. DELETE (Eliminación de Registros)
-- Registro de prueba para eliminación
INSERT INTO comentarios (id_comic, id_usuario, contenido) 
VALUES (1, 2, 'Comentario de prueba que será eliminado');

-- Eliminación usando WHERE estricto
DELETE FROM comentarios 
WHERE id_comentario = 1;