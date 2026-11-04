# Parte 1: Normalización Aplicada al Proyecto Integrador (CÓMIC HUB)

**Carrera:** Tecnicatura Superior en Análisis de Sistemas y Desarrollo de Software  
**Unidad Curricular:** Programación Web  
**Proyecto Integrador:** CÓMIC HUB - Portal Dinámico de Cómics y Comunidad  
**Estudiante:** Marco Farfán  

---

## 1. Entidad / Tabla Principal sin Normalizar (0FN - Tabla No Normalizada)

En el diseño inicial sin normalizar, la información de una publicación de cómic incluye datos repetidos del usuario autor, la editorial, listas de categorías y comentarios concatenados en un solo campo multivalorado.

### Tabla No Normalizada: `tabla_comics_no_normalizada`

| id_comic | titulo | sinopsis | fecha_pub | usuario_autor | email_usuario | rol_usuario | editorial | ubicacion_editorial | categorias | comentarios |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **101** | Batman: Year One | Origen del caballero de la noche | 1987-02-01 | Marco Farfán | marco@comichub.com | Administrador | DC Comics | Burbank, CA | Novela Gráfica, Policial, Origen | "Excelente historia", "El mejor arco" |
| **102** | Civil War #1 | Conflicto entre héroes de Marvel | 2006-05-01 | Marco Farfán | marco@comichub.com | Administrador | Marvel Comics | New York, NY | Crossover, Grandes Eventos | "Increíble inicio" |

---

## 2. Proceso de Normalización Paso a Paso

###  Primera Forma Normal (1FN)
* **Regla:** Eliminar grupos repetitivos y garantizar que todos los atributos sean atómicos (valores indivisibles).
* **Problema en 0FN:** Los campos `categorias` y `comentarios` contienen listas separadas por comas (multivalorados).
* **Solución 1FN:** Se independizan los valores atómicos eliminando las listas concatenadas.

#### Estructura en 1FN (Campos atómicos):
- **`comics_1fn`**: `(id_comic, titulo, sinopsis, fecha_pub, usuario_autor, email_usuario, rol_usuario, editorial, ubicacion_editorial)`
- **`comic_categorias_1fn`**: `(id_comic, categoria)`
- **`comic_comentarios_1fn`**: `(id_comentario, id_comic, usuario_comentario, contenido_comentario)`

---

### Segunda Forma Normal (2FN)
* **Regla:** Estar en 1FN y garantizar que todos los atributos que no forman parte de la clave primaria dependan de la clave primaria completa (eliminar dependencias parciales).
* **Problema en 1FN:** En la entidad de cómics, la información del autor (`usuario_autor`, `email_usuario`, `rol_usuario`) y de la editorial (`editorial`, `ubicacion_editorial`) depende de sus propias entidades y no directamente del `id_comic`.
* **Solución 2FN:** Se dividen las entidades separando los datos del usuario y la editorial en tablas independientes.

#### Estructura en 2FN:
- **`comics_2fn`**: `(id_comic, titulo, sinopsis, fecha_pub, id_usuario, id_editorial)`
- **`usuarios_2fn`**: `(id_usuario, usuario_autor, email_usuario, rol_usuario)`
- **`editoriales_2fn`**: `(id_editorial, nombre_editorial, ubicacion_editorial)`
- **`categorias_2fn`**: `(id_categoria, nombre_categoria)`
- **`comentarios_2fn`**: `(id_comentario, id_comic, id_usuario, contenido)`

---

### Tercera Forma Normal (3FN)
* **Regla:** Estar en 2FN y eliminar las dependencias transitivas (atributos no-clave que dependen de otros atributos no-clave).
* **Problema en 2FN:** 
  1. En `usuarios_2fn`, el atributo `rol_usuario` determina permisos pero es un texto repetitivo que depende funcionalmente de la definición del rol.
  2. La relación entre `comics` y `categorias` es de muchos a muchos ($N:M$), ya que un cómic puede tener muchas categorías y una categoría puede aplicarse a muchos cómics.
* **Solución 3FN:** 
  1. Se crea la tabla maestra `roles` para eliminar la dependencia transitiva en usuarios.
  2. Se define la tabla intermedia `comic_categoria` con clave primaria compuesta `(id_comic, id_categoria)`.

---

## 3. Diagrama / Listado de Tablas Normalizadas (3FN)

A continuación se presenta el esquema relacional optimizado definitivo para el sistema **CÓMIC HUB**:

### 1. Tabla Maestra: `roles`
* **`id_rol`** (PK, INT, AUTO_INCREMENT)
* `nombre` (VARCHAR(50), NOT NULL, UNIQUE)

### 2. Tabla de Usuarios: `usuarios`
* **`id_usuario`** (PK, INT, AUTO_INCREMENT)
* `nombre` (VARCHAR(100), NOT NULL)
* `email` (VARCHAR(150), NOT NULL, UNIQUE)
* `password` (VARCHAR(255), NOT NULL)
* **`id_rol`** (FK, INT $\rightarrow$ `roles.id_rol`)
* `created_at` (TIMESTAMP)
* `updated_at` (TIMESTAMP)

### 3. Tabla Maestra: `editoriales`
* **`id_editorial`** (PK, INT, AUTO_INCREMENT)
* `nombre` (VARCHAR(100), NOT NULL, UNIQUE)
* `pais` (VARCHAR(50))

### 4. Tabla Maestra: `categorias`
* **`id_categoria`** (PK, INT, AUTO_INCREMENT)
* `nombre` (VARCHAR(100), NOT NULL, UNIQUE)
* `descripcion` (TEXT)

### 5. Tabla Principal de Negocio: `comics`
* **`id_comic`** (PK, INT, AUTO_INCREMENT)
* `titulo` (VARCHAR(200), NOT NULL)
* `sinopsis` (TEXT)
* `anio_publicacion` (INT)
* **`id_editorial`** (FK, INT $\rightarrow$ `editoriales.id_editorial`)
* **`id_usuario`** (FK, INT $\rightarrow$ `usuarios.id_usuario`)
* `created_at` (TIMESTAMP)
* `updated_at` (TIMESTAMP)

### 6. Tabla Intermedia Relacional (N:M): `comic_categoria`
* **`id_comic`** (PK / FK $\rightarrow$ `comics.id_comic`)
* **`id_categoria`** (PK / FK $\rightarrow$ `categorias.id_categoria`)

### 7. Tabla de Interacción/Comentarios: `comentarios`
* **`id_comentario`** (PK, INT, AUTO_INCREMENT)
* **`id_comic`** (FK, INT $\rightarrow$ `comics.id_comic`)
* **`id_usuario`** (FK, INT $\rightarrow$ `usuarios.id_usuario`)
* `contenido` (TEXT, NOT NULL)
* `created_at` (TIMESTAMP)
* `updated_at` (TIMESTAMP)