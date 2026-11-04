-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS comic_hub_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE comic_hub_db;

-- 1. Tabla Secundaria/Maestra: Roles
CREATE TABLE IF NOT EXISTS roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 2. Tabla de Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 3. Tabla Secundaria/Maestra: Editoriales
CREATE TABLE IF NOT EXISTS editoriales (
    id_editorial INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    pais VARCHAR(50) DEFAULT 'EE.UU.'
) ENGINE=InnoDB;

-- 4. Tabla Secundaria/Maestra: Categorías
CREATE TABLE IF NOT EXISTS categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT
) ENGINE=InnoDB;

-- 5. Tabla Principal de Negocio: Cómics
CREATE TABLE IF NOT EXISTS comics (
    id_comic INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    sinopsis TEXT,
    anio_publicacion INT,
    id_editorial INT NOT NULL,
    id_usuario INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_editorial) REFERENCES editoriales(id_editorial) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 6. Tabla de Relación N:M: Cómic - Categoría
CREATE TABLE IF NOT EXISTS comic_categoria (
    id_comic INT NOT NULL,
    id_categoria INT NOT NULL,
    PRIMARY KEY (id_comic, id_categoria),
    FOREIGN KEY (id_comic) REFERENCES comics(id_comic) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 7. Tabla de Detalle/Interacción: Comentarios
CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_comic INT NOT NULL,
    id_usuario INT NOT NULL,
    contenido TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_comic) REFERENCES comics(id_comic) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Optimización con Índices Explícitos
CREATE INDEX idx_usuarios_email ON usuarios(email);
CREATE INDEX idx_comics_titulo ON comics(titulo);
CREATE INDEX idx_comics_editorial ON comics(id_editorial);